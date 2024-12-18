@extends('frontend.master.other')
@section('title', 'Dashboard - Ninico')
@section('body')


<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Dashboard</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href=""><i class="lni lni-home"></i> Home</a></li>
                    <li>Dashboard</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="account-login section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-body rounded-0">
                    <div class="list-group">
                        <a href="{{route('customer.dashboard')}}"
                            class="list-group-item list-group-item-action active">My Dashboard</a>
                        <a href="{{route('customer.order')}}" class="list-group-item list-group-item-action">My
                            Order</a>
                        <a href="{{route('customer.profile')}}" class="list-group-item list-group-item-action">My
                            Profile</a>
                        <a href="{{route('customer.change-password')}}"
                            class="list-group-item list-group-item-action">Change Password</a>
                        <a href="{{route('customer.logout')}}" class="list-group-item list-group-item-action">Logout</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card card-body rounded-0">
                    <h1 class="text-center">Welcome {{Session::get('customer_name')}}</h1>
                    <hr />
                    <h4 class="my-4">My Recent Order</h4>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Order Date</th>
                                <th>Order Status</th>
                                <th>Order Total</th>
                                <th>Payment Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$order->order_date}}</td>
                                <td>{{$order->order_status}}</td>
                                <td>{{$order->order_total}}</td>
                                <td>{{$order->payment_status}}</td>
                                <td>
                                    <a href="" class="btn btn-success btn-sm">Detail</a>
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



@endsection