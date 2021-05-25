<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $timestamps = true;

    public function index()
    {
        $products = Product::paginate(4);
        return view('admin-panel.products.index', ['products' => $products]);
    }

    public function create()
    {
        return view('admin-panel.products.create');
    }

    public function store(ProductRequest $req){
        $product = new Product();
        $product->title = $req->input('title');
        $req->file('img')->store('images', 'public');
        $product->img = $req->img->hashName();
        $product->description = $req->input('description');
        $product->price = $req->input('price');
        $product->quantity = $req->input('quantity');
        $product->category_id = $req->input('category_id');


        $product->save();
        return redirect()->route('product.index');
    }

    public function show($id)
    {
        $product = new Product;
        return view('admin-panel.products.show', ['product' => $product->find($id)]);
    }

    public function edit($id){
        $product = new Product;
        return view('admin-panel.products.edit', ['product' => $product->find($id)]);
    }

    public function update(Request $req, $id){
        $product = Product::find($id);
        $product->title = $req->input('title');
        $product->description = $req->input('description');
        $product->price = $req->input('price');
        $product->quantity = $req->input('quantity');
        $product->category_id = $req->input('category_id');

        $product->save();

        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();

        return redirect()->route('product.index');
    }

}
