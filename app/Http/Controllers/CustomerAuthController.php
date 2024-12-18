<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class CustomerAuthController extends Controller
{
    private $customer;
    public function index()
    {
        return view('customer.auth.index');
    }
    public function login(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);

        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        //     $customer = Auth::user();
        //     Session::put('customer_id', $customer->id);
        //     Session::put('customer_name', $customer->name);
        //     return redirect('/checkout/payment');
        // } else {
        //     return redirect()->back()->with(['message' => 'Invalid credentials']);
        // }
        $email = strtolower(trim($request->email));
        $this->customer = Customer::where('email', $email)->first();
        if ($this->customer) {
            if (password_verify($request->password, $this->customer->password)) {
                Session::put('customer_id', $this->customer->id);
                Session::put('customer_name', $this->customer->name);

                return redirect('/checkout/payment');
            } else {
                return back()->with('message', 'Your password is invalid');
            }
        } else {
            return back()->with('message', 'Your email address is invalid');
        }
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $this->customer = Customer::newCustomer($request);

        Session::put('customer_id', $this->customer->id);
        Session::put('customer_name', $this->customer->name);

        return redirect('/checkout/payment');
    }

    public function dashboard()
    {
        return view('customer.dashboard', ['orders' => Order::where('customer_id' == 'order_id')]);
    }
    public function order()
    {
        return view('customer.order', ['orders' => Order::where('customer_id' == 'order_id')]);
    }
    public function profile()
    {
        return view('customer.profile', ['user' => Customer::find(Session::get('customer_id'))]);
    }
    public function changePassword()
    {
        return view('customer.change-password');
    }

    public function logout()
    {
        Session::forget('customer_id');
        Session::forget('customer_name');

        return redirect('/');
    }
}