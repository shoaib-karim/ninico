<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function index()
    {
        return view('backend.subcategory.index', ['subcategories' => SubCategory::all()]);
    }
    public function create()
    {
        return view('backend.subcategory.create', ['categories' => Category::all()]);
    }
    public function store(Request $request)
    {
        SubCategory::newSubCategory($request);
        return back()->with('message', 'Sub-Category Created Successfullly');
    }
    public function edit($id)
    {
        return view(
            'backend.subcategory.edit',
            [
                'subcategory' => SubCategory::find($id),
                'categories' => Category::all()
            ]
        );
    }
    public function update(Request $request, $id)
    {
        SubCategory::updateSubCategory($request, $id);
        return redirect('/sub-category')->with('message', 'Sub-Category Info Updated');
    }
    public function delete($id)
    {
        SubCategory::deleteSubCategory($id);
        return redirect('/sub-category')->with('message', 'Sub-Category Info Deleted');
    }
}
