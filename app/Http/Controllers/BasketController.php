<?php

namespace App\Http\Controllers;

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

    public function procced(){
        $user_id = Auth::id();
        $items = \Cart::session($user_id)->getContent();
        return redirect()->route('basket');
    }
}
