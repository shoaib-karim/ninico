<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public static $brand, $image, $imageName, $imageURL, $directory;

    public static function getImageURL($request)
    {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'upload/brand/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageURL = self::$directory . self::$imageName;
        return self::$imageURL;
    }

    public static function newBrand($request)
    {
        self::$brand = new Brand();
        self::$brand->name = $request->name;
        self::$brand->description = $request->description;
        self::$brand->image = self::getImageURL($request);
        self::$brand->status = $request->status;
        self::$brand->save();
    }

    public static function updateBrand($request, $id)
    {
        self::$brand = Brand::find($id);
        if ($request->file('image')) {
            self::$imageURL = self::getImageURL($request);
        } else {
            self::$imageURL = self::$brand->image;
        }
        self::$brand->name = $request->name;
        self::$brand->description = $request->description;
        self::$brand->image = self::$imageURL;
        self::$brand->status = $request->status;
        self::$brand->save();
    }

    public static function deleteBrand($id)
    {
        $brand = self::find($id);
        if ($brand) {
            $brand->delete();
        }
    }
}
