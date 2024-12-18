<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public static $category, $image, $imageName, $imageURL, $directory;

    public static function getImageURL($request)
    {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'upload/category-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageURL = self::$directory . self::$imageName;
        return self::$imageURL;
    }

    public static function newCategory($request)
    {
        self::$category = new Category();
        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->image = self::getImageURL($request);
        self::$category->status = $request->status;
        self::$category->save();
    }

    public static function updateCategory($request, $id)
    {
        self::$category = Category::find($id);
        if ($request->file('image')) {
            self::$imageURL = self::getImageURL($request);
        } else {
            self::$imageURL = self::$category->image;
        }
        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->image = self::$imageURL;
        self::$category->status = $request->status;
        self::$category->save();
    }

    public static function deleteCategory($id)
    {
        $category = self::find($id);
        if ($category) {
            $category->delete();
        }
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
