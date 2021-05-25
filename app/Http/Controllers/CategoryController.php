<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Product;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public $timestamps = true;

    public function index()
    {
        $categories = Category::paginate(4);
        return view('admin-panel.categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('admin-panel.categories.create');
    }

    public function store(CategoryRequest $req){
        $categories = new Category;
        $categories->name = $req->input('name');
        $categories->description = $req->input('description');

        $categories->save();
        return redirect()->route('category.index');
    }

    public function show($id)
    {
        $products = Product::paginate(10000)->where('category_id', $id);
        $categories = new Category;
        return view('admin-panel.categories.show', ['products' => $products], ['categories' => $categories->find($id)]);
    }

    public function edit($id){
        $categories = new Category;
        return view('admin-panel.categories.edit', ['categories' => $categories->find($id)]);
    }

    public function update(Request $req, $id){
        $categories = Category::find($id);
        $categories->name = $req->input('name');
        $categories->description = $req->input('description');

        $categories->save();

        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        Category::find($id)->delete();

        return redirect()->route('category.index');
    }

}
