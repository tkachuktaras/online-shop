<?php

namespace App\Http\Controllers;

use App\OrderDetails;
use App\Product;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class DashboardController extends Controller
{
    public function index()
    {
        $order_details = OrderDetails::get();
        $total = 0;
        foreach ($order_details as $row) {
            $product = Product::where('id', $row->product_id)->first();
            $total = $total + ($row->quantity * $product->price);
        }

        return view('admin-panel.dashboard', ['total' => $total]);
    }
}
