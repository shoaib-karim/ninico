<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopGridController extends Controller
{
    public function index()
    {
        return view('frontend.home.index', [
            'products' => Product::where('status', 1)->orderBy('id', 'desc')->take(10)->get(),
            'categories' => Category::where('status', 1)->orderBy('name')->get(),
        ]);
    }
    public function shop($id = null)
    {
        if ($id) {
            return view('frontend.shop.index', ['products' => Product::where('status', 1)->Where('category_id', $id)->get(), 'categories' => Category::where('status', 1)->orderBy('name')->get(),]);
        } else {
            return view('frontend.shop.index', ['products' => Product::where('status', 1)->orderBy('name')->get(), 'categories' => Category::where('status', 1)->orderBy('name')->get(),]);
        }
    }

    public function subCategory($id = null)
    {
        if ($id) {
            return view('frontend.shop.index', ['products' => Product::where('status', 1)->Where('sub_category_id', $id)->get()]);
        } else {
            return view('frontend.shop.index', ['products' => Product::where('status', 1)->orderBy('name')->get()]);
        }
    }
    public function productDetails($id)
    {
        return view('frontend.shop.details', ['product' => Product::find($id)]);
    }
    public function about()
    {
        return view('frontend.about.index');
    }
    public function blog()
    {
        return view('frontend.blog.index');
    }
    public function contact()
    {
        return view('frontend.contact.index');
    }
}
