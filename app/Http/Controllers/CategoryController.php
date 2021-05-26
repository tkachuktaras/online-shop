<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Product;

class CategoryController extends Controller
{
    public $timestamps = true;

    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin-panel.categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('admin-panel.categories.create');
    }

    public function store(CategoryRequest $req){
        $category = new Category;
        $category->name = $req->input('name');
        $category->description = $req->input('description');

        $category->save();
        return redirect()->route('category.index');
    }

    public function show($id)
    {
        $products = Product::where('category_id', $id)->paginate(10);
        $category = Category::find($id);
        return view('admin-panel.categories.show', ['products' => $products, 'category' => $category]);
    }

    public function edit($id){
        $category = Category::find($id);
        return view('admin-panel.categories.edit', ['category' => $category]);
    }

    public function update(Request $req, $id){
        $category = Category::find($id);
        $category->name = $req->input('name');
        $category->description = $req->input('description');

        $category->save();

        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        Category::find($id)->delete();

        return redirect()->route('category.index');
    }

}
