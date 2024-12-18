<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    private static $gallery, $imageName, $imageURL, $directory;

    public static function newGallery($images, $id)
    {
        foreach ($images as $image) {
            self::$imageName = $image->getClientOriginalName();
            self::$directory = 'upload/product-gallery/';
            $image->move(self::$directory, self::$imageName);
            self::$imageURL = self::$directory . self::$imageName;

            self::$gallery = new GalleryImage();
            self::$gallery->product_id = $id;
            self::$gallery->gallery = self::$imageURL;
            self::$gallery->save();
        }
    }

    public static function updateGallery($images, $id)
    {
        $gallery = GalleryImage::where('product_id', $id)->get();
        foreach ($gallery as $image) {
            $image->delete();
        }
        GalleryImage::newGallery($images, $id);
    }
}
