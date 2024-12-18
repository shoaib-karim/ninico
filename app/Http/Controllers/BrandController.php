<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return view('backend.brand.index', ['brands' => Brand::all()]);
    }
    public function create()
    {
        return view('backend.brand.create');
    }
    public function store(Request $request)
    {
        Brand::newBrand($request);
        return back()->with('message', 'Brand Created Successfullly');
    }
    public function edit($id)
    {
        return view('backend.brand.edit', ['brand' => Brand::find($id)]);
    }
    public function update(Request $request, $id)
    {
        Brand::updateBrand($request, $id);
        return redirect('/brand')->with('message', 'Brand Info Updated');
    }
    public function delete($id)
    {
        Brand::deleteBrand($id);
        return redirect('/brand')->with('message', 'Brand Info Deleted');
    }
}
