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
                        <h1 class="page-title">Manage Order</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Orders</li>
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
                                <p id="successMessage" class="text-success">{{ session('message') }}</p>
                                <div class="table-responsive">
                                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                        <thead>
                                            <tr>
                                                <th class="wd-15p border-bottom-0">Sl No</th>
                                                <th class="wd-15p border-bottom-0">Order Date</th>
                                                <th class="wd-20p border-bottom-0">Customer Info</th>
                                                <th class="wd-15p border-bottom-0">Order Total</th>
                                                <th class="wd-10p border-bottom-0">Order Status</th>
                                                <th class="wd-10p border-bottom-0">Delivery Status</th>
                                                <th class="wd-10p border-bottom-0">Payment Status</th>
                                                <th class="wd-25p border-bottom-0">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$order->order_date}}</td>
                                                <td>{{$order->customer->name}}</td>
                                                <td>{{$order->order_total}}</td>
                                                <td>{{$order->order_status}}</td>
                                                <td>{{$order->delivery_status}}</td>
                                                <td>{{$order->payment_status}}</td>
                                                <td>
                                                    <div class="d-flex align-items-stretch">
                                                        <a href="{{ route('order.details', ['id' => $order->id]) }}"
                                                            class="btn btn-sm btn-outline-primary border me-2"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-original-title="Order Details">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                enable-background="new 0 0 24 24" height="20" width="16"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M15.8085327,8.6464844l-5.6464233,5.6464844l-2.4707031-2.4697266c-0.0023804-0.0023804-0.0047607-0.0047607-0.0072021-0.0071411c-0.1972046-0.1932373-0.5137329-0.1900635-0.7069702,0.0071411c-0.1932983,0.1972656-0.1900635,0.5137939,0.0071411,0.7070312l2.8242188,2.8232422C9.9022217,15.4474487,10.02948,15.5001831,10.1621094,15.5c0.1326294,0.0001221,0.2598267-0.0525513,0.3534546-0.1464844l6-6c0.0023804-0.0023804,0.0047607-0.0046997,0.0071411-0.0071411c0.1932373-0.1972046,0.1900635-0.5137329-0.0071411-0.7069702C16.3183594,8.446106,16.0018311,8.4493408,15.8085327,8.6464844z M12,2C6.4771729,2,2,6.4771729,2,12s4.4771729,10,10,10c5.5201416-0.0064697,9.9935303-4.4798584,10-10C22,6.4771729,17.5228271,2,12,2z M12,21c-4.9705811,0-9-4.0294189-9-9s4.0294189-9,9-9c4.9683228,0.0054321,8.9945679,4.0316772,9,9C21,16.9705811,16.9705811,21,12,21z" />
                                                            </svg>
                                                        </a>
                                                        <a href="{{ route('order.edit', ['id' => $order->id]) }}"
                                                            class="btn btn-sm btn-outline-secondary border me-2"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-original-title="Edit Order Details">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                                                viewBox="0 0 24 24" width="16">
                                                                <path d="M0 0h24v24H0V0z" fill="none" />
                                                                <path
                                                                    d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4h-3.5z" />
                                                            </svg>
                                                        </a>
                                                        <a href="{{ route('order.invoice', ['id' => $order->id]) }}"
                                                            class="btn btn-sm btn-outline-secondary border me-2"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-original-title="Order Invoice">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                                                viewBox="0 0 24 24" width="16">
                                                                <path d="M0 0h24v24H0V0z" fill="none" />
                                                                <path
                                                                    d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4h-3.5z" />
                                                            </svg>
                                                        </a>
                                                        <a href="{{ route('order.download-invoice', ['id' => $order->id]) }}"
                                                            class="btn btn-sm btn-outline-secondary border me-2"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-original-title="Download Invoice ">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                                                viewBox="0 0 24 24" width="16">
                                                                <path d="M0 0h24v24H0V0z" fill="none" />
                                                                <path
                                                                    d="M5 20h14v-2H5v2zm7-18v12l4-4h-3V8H9v4H6l4 4V2h2z" />
                                                            </svg>
                                                        </a>
                                                        <a href="{{ route('order.delete', ['id' => $order->id]) }}"
                                                            class="btn btn-sm btn-outline-secondary border me-2 {{$order->order_status == 'pending' ? 'disabled' : ''}}"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-original-title="Delete Order Details">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                                                viewBox="0 0 24 24" width="16">
                                                                <path d="M0 0h24v24H0V0z" fill="none" />
                                                                <path
                                                                    d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4h-3.5z" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
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