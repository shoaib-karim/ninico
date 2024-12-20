@extends('backend.master.admin')
@section('body')
<style>
.invoice-box {
    max-width: 800px;
    margin: auto;
    padding: 30px;
    border: 1px solid #eee;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
    font-size: 16px;
    line-height: 24px;
    font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    color: #555;
}

.invoice-box table {
    width: 100%;
    line-height: inherit;
    text-align: left;
}

.invoice-box table td {
    padding: 5px;
    vertical-align: top;
}

.invoice-box table tr td:nth-child(2) {
    text-align: right;
}

.invoice-box table tr.top table td {
    padding-bottom: 20px;
}

.invoice-box table tr.top table td.title {
    font-size: 45px;
    line-height: 45px;
    color: #333;
}

.invoice-box table tr.information table td {
    padding-bottom: 40px;
}

.invoice-box table tr.heading td {
    background: #eee;
    border-bottom: 1px solid #ddd;
    font-weight: bold;
}

.invoice-box table tr.details td {
    padding-bottom: 20px;
}

.invoice-box table tr.item td {
    border-bottom: 1px solid #eee;
}

.invoice-box table tr.item.last td {
    border-bottom: none;
}

.invoice-box table tr.total td:nth-child(2) {
    border-top: 2px solid #eee;
    font-weight: bold;
}

@media only screen and (max-width: 600px) {
    .invoice-box table tr.top table td {
        width: 100%;
        display: block;
        text-align: center;
    }

    .invoice-box table tr.information table td {
        width: 100%;
        display: block;
        text-align: center;
    }
}

/** RTL **/
.invoice-box.rtl {
    direction: rtl;
    font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
}

.invoice-box.rtl table {
    text-align: right;
}

.invoice-box.rtl table tr td:nth-child(2) {
    text-align: left;
}
</style>
<div class="page-main">
    <!--app-content open-->
    <div class="app-content main-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Order Invoice</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Order Invoice</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <!-- Row -->
                <div class="row row-sm">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Order Info</h3>
                            </div>
                            <div class="card-body">
                                <div class="invoice-box">
                                    <table cellpadding="0" cellspacing="0">
                                        <tr class="top">
                                            <td colspan="2">
                                                <table>
                                                    <tr>
                                                        <td class="title">
                                                            <img src="{{ asset('/') }}images/logo.png"
                                                                style="width: 40%; max-width: 300px" />
                                                        </td>

                                                        <td>
                                                            <b>Invoice #:</b> {{$order->id}}<br />
                                                            <b>Date:</b> {{$order->order_date}}
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>

                                        <tr class="information">
                                            <td colspan="2">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            {{$order->delivery_address}}
                                                        </td>

                                                        <td>
                                                            {{$order->customer->name}}<br />
                                                            {{$order->customer->phone}}
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>

                                        <tr class="heading">
                                            <td>Item</td>

                                            <td>qty</td>

                                            <td>Price</td>

                                            <td>Total</td>
                                        </tr>

                                        @php($sum=0)
                                        @foreach ($order->orderDetails as $orderDetail)
                                        <tr class="item">
                                            <td>{{$orderDetail->product_name}}</td>

                                            <td>{{$orderDetail->product_qty}}</td>

                                            <td>{{$orderDetail->product_price}}</td>

                                            <td>{{$sum = $orderDetail->product_qty * $orderDetail->product_price}}</td>
                                        </tr>
                                        @endforeach

                                        <tr class="total">
                                            <td></td>

                                            <td>Tax Total: BDT {{$order->tax_total}}</td>
                                        </tr>
                                        <tr class="total">
                                            <td></td>


                                            <td>Shipping Total: BDT {{$order->shipping_total}}</td>

                                        </tr>
                                        <tr class="total">
                                            <td></td>

                                            <td>Total Payable: BDT
                                                {{$sum + $order->tax_total + $order->shipping_total}}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Row -->
            </div>
        </div>
    </div>
</div>

@endsection