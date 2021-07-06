<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetails;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();

        $user = User::where('id', $user_id)->first();

        $items = \Cart::session($user_id)->getContent();
        $cart = $items->sort();

        return view('basket', ['items' => $cart, 'user' => $user]);
    }

    public function addToBasket(Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        $user_id = Auth::id();
        \Cart::session($user_id);
        \Cart::add([
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => [
                'img' => asset('/storage/images/').'/'.$product->img
            ],
            'associatedModel' => $product
        ]);
        return response()->json(\Cart::getContent());
    }

    public function remove($id){
        $user_id = Auth::id();
        \Cart::session($user_id)->remove($id);
        return redirect()->route('basket');
    }

    public function update($id, Request $request){
        $user_id = Auth::id();
        \Cart::session($user_id)->update($id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->qtyItem
            ),
        ));

        return redirect()->route('basket');
    }

    public function proceed(){
        $user_id = Auth::id();
        $wallet = User::where('id', $user_id)->first()->money_amount;
        $items = \Cart::session($user_id)->getContent();


        $user = User::where('id', $user_id)->first();
        $user->money_amount = $user->money_amount - \Cart::session($user_id)->getSubTotal();
        $user->save();


        $order = new Order();
        $order->user_id = $user_id;
        $order->save();
        $order = Order::where('user_id', $user_id)->orderBy('created_at', 'desc')->first()->id;


        foreach($items as $row) {
            $product = Product::where('id', $row->id)->first();
            $order_details = new OrderDetails();
            $order_details->order_id = $order;
            $order_details->product_id = $row->id;
            $order_details->quantity = $row->quantity;
            $product->quantity = $product->quantity - $row->quantity;
            $order_details->save();
            $product->save();
            \Cart::session($user_id)->remove($row->id);
        }

        return redirect()->route('basket');
    }
}
