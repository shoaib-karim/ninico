@extends('backend.master.admin')
@section('body')

<div class="page-main">
    <!--app-content open-->
    <div class="app-content main-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Edit Order</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Order</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <!-- Row -->
                <div class="row row-sm">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Order Edit Info</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{route('order.update', ['id' => $order->id])}}" method="post">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            Order Total
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" readonly
                                                value="{{$order->order_total}}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            Customer Info
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" readonly
                                                value="{{$order->customer->name}}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            Order Status
                                        </div>
                                        <div class="col-md-9">
                                            <select class="form-control" name="order_status" id="">
                                                <option value="0"> --Select Order Status-- </option>
                                                <option value="pending" @selected($order->order_status == 'pending')>
                                                    Pending </option>
                                                <option value="processing" @selected($order->order_status ==
                                                    'processing')> Processing </option>
                                                <option value="complete" @selected($order->order_status == 'complete')>
                                                    Complete </option>
                                                <option value="cancel" @selected($order->order_status == 'cancel')>
                                                    Cancel </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            Courier Info
                                        </div>
                                        <div class="col-md-9">
                                            <select class="form-control" name="currier_id" id="">
                                                <option value="0"> --Select Currier-- </option>
                                                <option value="1" @selected($order->currier_status == '1')> SA Poribahan
                                                </option>
                                                <option value="2" @selected($order->currier_status == '2')> Sundarban
                                                </option>
                                                <option value="3" @selected($order->currier_status == '3')> Saudagor
                                                </option>
                                                <option value="4" @selected($order->currier_status == '4')> RedX
                                                </option>
                                                <option value="5" @selected($order->currier_status == '5')> Pathao
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            Delivery Address
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="delivery_address"
                                                value="{{$order->delivery_address}}" />
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Update Order Status</button>
                                </form>
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