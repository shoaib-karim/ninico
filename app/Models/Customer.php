<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public static $customer;

    public static function newCustomer($request)
    {
        self::$customer = new Customer();
        self::$customer->name = $request->name;
        self::$customer->email = $request->email;
        self::$customer->phone = $request->phone;
        self::$customer->password = bcrypt($request->password);
        self::$customer->address = $request->address;
        self::$customer->save();
        return self::$customer;
    }

    public static function deleteCustomer($id)
    {
        $customer = self::find($id);
        if ($customer) {
            $customer->delete();
        }
    }
}
