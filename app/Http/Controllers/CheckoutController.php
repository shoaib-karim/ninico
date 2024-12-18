<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        if (Session::get('customer_id')) {
            return view('frontend.checkout.index');
        } else {
            return view('customer.auth.index');
        }
    }

    public function payment()
    {
        return view('frontend.checkout.index');
    }

    private $order;
    public function newOrder(Request $request)
    {
        if ($request->payment_method == 'COD') {
            $this->order = Order::storeOrder($request);
            OrderDetail::newOrderDetails($this->order->id);
            return redirect('checkout/complete-order')->with('message', 'Order info saved successful');
        } else {
            $sslCommerzPaymentController = new SslCommerzPaymentController();
            $sslCommerzPaymentController->index($request);
        }
    }

    public function completeOrder()
    {
        return view('frontend.checkout.complete');
    }
}
