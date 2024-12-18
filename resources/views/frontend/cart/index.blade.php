@extends('frontend.master.other')
@section('title', 'Cart Details - Ninico')
@section('body')


<!-- breadcrumb-area -->
<section class="breadcrumb__area pt-60 pb-60 tp-breadcrumb__bg"
    data-background="{{asset('/')}}assets/img/banner/breadcrumb-01.jpg">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-7 col-lg-12 col-md-12 col-12">
                <div class="tp-breadcrumb">
                    <div class="tp-breadcrumb__link mb-10">
                        <span class="breadcrumb-item-active"><a href="{{route('home')}}">Home</a></span>
                        <span>Cart</span>
                    </div>
                    <h2 class="tp-breadcrumb__title">Product Cart</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb-area-end -->

<!-- cart area -->
<section class="cart-area pt-80 pb-80 wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p id="successMessage" class="text-success">{{session('message')}}</p>

                <div class="table-content table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Images</th>
                                <th class="cart-product-name">Name</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php($sum = 0)
                            @foreach ($products as $product)
                            <form action="{{route('cart.update', ['id' => $product->rowId])}}" method="post">
                                @csrf
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="{{route('product-details',['id' => $product->id])}}"><img
                                                src="{{asset($product->options->image)}}" alt="">
                                        </a>
                                    </td>
                                    <td class="product-name">
                                        <a
                                            href="{{route('product-details',['id' => $product->id])}}">{{$product->name}}</a>
                                    </td>
                                    <td class="product-price">
                                        <span class="amount">BDT {{$product->price}}</span>
                                    </td>
                                    <td class="product-quantity">

                                        <input type="text" class="cart-input" name="qty" value="{{$product->qty}}"
                                            min="1">
                                        <button class="tp-btn tp-color-btn banner-animation" name="update_cart"
                                            type="submit">Update cart</button>
                                        <!-- <button type="submit" class="btn btn-success">Update</button> -->

                                    </td>
                                    <td class="product-subtotal">
                                        <span class="amount">BDT {{$totalItem = $product->qty * $product->price}}</span>
                                    </td>
                                    <td class="product-remove">
                                        <a href="{{route('cart.remove', ['id' => $product->rowId])}}"><i
                                                class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                @php($sum= $sum + $totalItem)
                                @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="coupon-all">
                            <div class="coupon">
                                <input id="coupon_code" class="input-text" name="coupon_code" value=""
                                    placeholder="Coupon code" type="text">
                                <button class="tp-btn tp-color-btn banner-animation" name="apply_coupon"
                                    type="submit">Apply
                                    Coupon</button>
                            </div>
                            <!-- <div class="coupon2">
                                <button class="tp-btn tp-color-btn banner-animation" name="update_cart"
                                    type="submit">Update cart</button>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-md-5 ">
                        <div class="cart-page-total">
                            <h2>Cart totals</h2>
                            <ul class="mb-20">
                                <li>Subtotal <span>BDT {{$sum}}</span></li>
                                <li>Tax Amount (15%)<span>{{$tax=$sum*.15}}</span></li>
                                <li>Shipping Charge<span>{{$shipping = 0}}</span></li>
                                <li>Discount<span>00.00</span></li>
                                <li class="last">Total Payable<span>BDT {{$sum + $tax +$shipping}}</span></li>
                            </ul>
                            <a href="{{route('checkout')}}" class="tp-btn tp-color-btn banner-animation">Proceed to
                                Checkout</a>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- cart area end-->

@endsection