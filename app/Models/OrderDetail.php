<?php

namespace App\Models;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    private static $orderDetails;
    public static function newOrderDetails($orderId)
    {
        foreach (Cart::content() as $item) {
            self::$orderDetails = new OrderDetail();
            self::$orderDetails->order_id = $orderId;
            self::$orderDetails->product_id = $item->id;
            self::$orderDetails->product_name = $item->name;
            self::$orderDetails->product_price = $item->price;
            self::$orderDetails->product_qty = $item->qty;
            self::$orderDetails->save();

            Cart::remove($item->rowId);
        }
    }
}
