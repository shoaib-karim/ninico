<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('backend.category.index', ['categories' => Category::all()]);
    }
    public function create()
    {
        return view('backend.category.create');
    }
    public function store(Request $request)
    {
        Category::newCategory($request);
        return back()->with('message', 'Category Created Successfullly');
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        Category::updateCategory($request, $id);
        return redirect('/category')->with('message', 'Category Info Updated');
    }
    public function delete($id)
    {
        Category::deleteCategory($id);
        return redirect('/category')->with('message', 'Category Info Deleted');
    }
}
