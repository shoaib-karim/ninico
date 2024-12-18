<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public static $unit;

    public static function newUnit($request)
    {
        self::$unit = new Unit();
        self::$unit->name = $request->name;
        self::$unit->code = $request->code;
        self::$unit->description = $request->description;
        self::$unit->status = $request->status;
        self::$unit->save();
    }

    public static function updateUnit($request, $id)
    {
        self::$unit = unit::find($id);
        self::$unit->name = $request->name;
        self::$unit->code = $request->code;
        self::$unit->description = $request->description;
        self::$unit->status = $request->status;
        self::$unit->save();
    }

    public static function deleteUnit($id)
    {
        $unit = self::find($id);
        if ($unit) {
            $unit->delete();
        }
    }
}
