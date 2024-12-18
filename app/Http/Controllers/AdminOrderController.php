<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    private $order, $orderDetails;
    public function index()
    {
        return view('backend.order.index', ['orders' => Order::latest()->get()]);
    }
    public function details($id)
    {
        return view('backend.order.details', ['order' => Order::find($id)]);
    }
    public function edit($id)
    {
        return view('backend.order.edit', ['order' => Order::find($id)]);
    }
    public function update(Request $request, $id)
    {
        $this->order = Order::find($id);
        if ($request->order_status == 'pending') {
            $this->order->order_status = $request->order_status;
            $this->order->delivery_status = $request->order_status;
            $this->order->payment_status = $request->order_status;
        } elseif ($request->order_status == 'processing') {
            $this->order->order_status = $request->order_status;
            $this->order->delivery_status = $request->order_status;
            $this->order->payment_status = $request->order_status;
            $this->order->delivery_address = $request->delivery_address;
            $this->order->currier_id = $request->currier_id;
        } elseif ($request->order_status == 'complete') {
            $this->order->order_status = $request->order_status;
            $this->order->delivery_status = $request->order_status;
            $this->order->payment_status = $request->order_status;
            $this->order->delivery_date = date('Y-m-d');
            $this->order->delivery_timestamp = strtotime(date('Y-m-d'));
            $this->order->payment_amount = $request->order_total;
            $this->order->payment_date = date('Y-m-d');
            $this->order->payment_timestamp = strtotime(date('Y-m-d'));
        } elseif ($request->order_status == 'cancel') {
            $this->order->order_status = $request->order_status;
            $this->order->delivery_status = $request->order_status;
            $this->order->payment_status = $request->order_status;
        }
        $this->order->save();
        return redirect('/order')->with('message', 'Order info Updated Successfully.');
    }
    public function invoice($id)
    {
        return view('backend.order.invoice', ['order' => Order::find($id)]);
    }

    private $pdf;
    public function download($id)
    {
        $this->pdf = PDF::loadView('backend.order.download-pdf', ['order' => Order::find($id)]);
        return $this->pdf->stream('invoice.pdf');
    }
    public function delete($id)
    {
        $this->orderDetails = OrderDetail::where('order_id', $id)->get();
        foreach ($this->orderDetails as $orderDetail) {
            $orderDetail->delete();
        }
        Order::find($id)->delete();
        return redirect('/order')->with('message', 'Order Deleted Successfully.');
    }
}