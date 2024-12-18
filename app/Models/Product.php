<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public static $product, $image, $imageName, $imageURL, $directory;

    public static function getImageURL($request)
    {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'upload/product-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageURL = self::$directory . self::$imageName;
        return self::$imageURL;
    }

    public static function newProduct($request)
    {
        self::$product = new Product();
        self::$product->category_id = $request->category_id;
        self::$product->sub_category_id = $request->sub_category_id;
        self::$product->brand_id = $request->brand_id;
        self::$product->name = $request->name;
        self::$product->short_description = $request->short_description;
        self::$product->long_description = $request->long_description;
        self::$product->regular_price = $request->regular_price;
        self::$product->sale_price = $request->sale_price;
        self::$product->meta_title = $request->meta_title;
        self::$product->meta_description = $request->meta_description;
        self::$product->code = $request->code;
        self::$product->stock_amount = $request->stock_amount;
        self::$product->image = self::getImageURL($request);
        self::$product->status = $request->status;
        self::$product->save();
        return self::$product;
    }

    public static function updateProduct($request, $id)
    {
        self::$product = Product::find($id);
        if ($request->file('image')) {
            self::$imageURL = self::getImageURL($request);
        } else {
            self::$imageURL = self::$product->image;
        }
        self::$product->category_id = $request->category_id;
        self::$product->sub_category_id = $request->sub_category_id;
        self::$product->brand_id = $request->brand_id;
        self::$product->unit_id = $request->unit_id;
        self::$product->name = $request->name;
        self::$product->short_description = $request->short_description;
        self::$product->long_description = $request->long_description;
        self::$product->regular_price = $request->regular_price;
        self::$product->sale_price = $request->sale_price;
        self::$product->meta_title = $request->meta_title;
        self::$product->meta_description = $request->meta_description;
        self::$product->code = $request->code;
        self::$product->stock_amount = $request->stock_amount;
        self::$product->image = self::$imageURL;
        self::$product->status = $request->status;
        self::$product->save();
    }

    public static function deleteProduct($id)
    {
        $product = self::find($id);
        if ($product) {
            $product->delete();
        }
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    public function gallery()
    {
        return $this->hasMany(GalleryImage::class);
    }
}
