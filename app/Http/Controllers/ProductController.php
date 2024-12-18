<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Unit;
use App\Models\GalleryImage;

class ProductController extends Controller
{
    private $product;
    public function index()
    {
        return view('backend.product.index', ['products' => Product::all()]);
    }
    public function create()
    {
        return view('backend.Product.create', ['categories' => Category::all(), 'subcategories' => SubCategory::all(), 'brands' => Brand::all(), 'units' => Unit::all()]);
    }
    public function store(Request $request)
    {
        $this->product = Product::newProduct($request);
        GalleryImage::newGallery($request->file('gallery'), $this->product->id);
        return back()->with('message', 'Product Created Successfullly');
    }
    public function edit($id)
    {
        return view(
            'backend.product.edit',
            [
                'product' => Product::find($id),
                'categories' => Category::all(),
                'subcategories' => SubCategory::all(),
                'brands' => Brand::all(),
                'units' => Unit::all()
            ]
        );
    }
    public function update(Request $request, $id)
    {
        Product::updateProduct($request, $id);
        if ($request->file('gallery')) {
            GalleryImage::updateGallery($request->file('gallery'), $id);
        }
        return redirect('/product')->with('message', 'Product Info Updated');
    }
    public function delete($id)
    {
        Product::deleteProduct($id);
        return redirect('/product')->with('message', 'Product Info Deleted');
    }

    public function getSubCategoryByCategory(Request $request)
    {
        $categoryId = $request->id;
        $subCategories = SubCategory::where('category_id', $categoryId)->get();
        return response()->json($subCategories);
    }
}
