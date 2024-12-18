<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public static $sub_category, $image, $imageName, $imageURL, $directory;

    public static function getImageURL($request)
    {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'upload/sub-category-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageURL = self::$directory . self::$imageName;
        return self::$imageURL;
    }

    public static function newSubCategory($request)
    {
        self::$sub_category = new SubCategory();
        self::$sub_category->category_id = $request->category_id;
        self::$sub_category->name = $request->name;
        self::$sub_category->description = $request->description;
        self::$sub_category->image = self::getImageURL($request);
        self::$sub_category->status = $request->status;
        self::$sub_category->save();
    }

    public static function updateSubCategory($request, $id)
    {
        self::$sub_category = SubCategory::find($id);
        if ($request->file('image')) {
            self::$imageURL = self::getImageURL($request);
        } else {
            self::$imageURL = self::$sub_category->image;
        }
        self::$sub_category->name = $request->name;
        self::$sub_category->description = $request->description;
        self::$sub_category->image = self::$imageURL;
        self::$sub_category->status = $request->status;
        self::$sub_category->save();
    }

    public static function deleteSubCategory($id)
    {
        $sub_category = self::find($id);
        if ($sub_category) {
            $sub_category->delete();
        }
    }
}
