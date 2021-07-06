<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetails;
use App\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public $timestamps = true;

    public function index()
    {
        $orders = Order::paginate(10);
        return view('admin-panel.orders.index', ['orders' => $orders]);
    }

    public function show($id)
    {
        $order = Order::where('id', $id)->with('orderDetails.products')->first();

        //dd($order->orderDetails[0]->products);

        return view('admin-panel.orders.show', ['order' => $order]);
    }
}
