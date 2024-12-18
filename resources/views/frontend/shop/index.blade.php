@extends('frontend.master.other')
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
                        <span>Shop</span>
                    </div>
                    <h2 class="tp-breadcrumb__title">Shop</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb-area-end -->

<!-- product-area-start -->
<div class="product-area pt-70 pb-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-12">
                <div class="product-sidebar__product-item">
                    <div class="product-filter-content mb-40">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <div class="product-item-count">
                                    <span><b>{{ $products->count() }}</b> Item On List</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-50">
                        <div class="col-lg-12">
                            <div class="tab-pane fade show active" id="nav-popular" role="tabpanel"
                                aria-labelledby="nav-popular-tab">
                                <div
                                    class="row row-cols-xxl-4 row-cols-xl-4 row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1 tpproduct">
                                    @foreach ($products as $product)
                                    <div class="col">
                                        <div class="tpproduct tpproductitem mb-15 p-relative">
                                            <div class="tpproduct__thumb">
                                                <div class="tpproduct__thumbitem p-relative">
                                                    <a href="{{route('product-details',['id' => $product->id])}}">
                                                        <img src="{{ asset($product->image) }}" alt="product-thumb">
                                                        @foreach ($product->gallery as $gallery)
                                                        <img class="thumbitem-secondary"
                                                            src="{{ asset($gallery->gallery)}}" alt="product-thumb">
                                                        @endforeach
                                                    </a>
                                                    <div class="tpproduct__thumb-bg">
                                                        <div class="tpproductactionbg">
                                                            <form
                                                                action="{{route('cart.store', ['id' => $product->id])}}"
                                                                method="post">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label>Quantity</label>
                                                                    <input class="form-control" type="number" name="qty"
                                                                        value="1">
                                                                </div>
                                                                <button class="fal fa-shopping-basket"
                                                                    style="width: 100%;"></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tpproduct__content-area">
                                                <h3 class="tpproduct__title mb-5"><a
                                                        href="{{route('product-details',['id' => $product->id])}}">{{$product->name}}</a>
                                                </h3>
                                                <div class="tpproduct__priceinfo p-relative">
                                                    <div class="tpproduct__ammount">
                                                        <span>BDT {{$product->sale_price}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tpproduct__ratingarea">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="tpproductdot">
                                                        <a class="tpproductdot__variationitem"
                                                            href="{{route('product-details',['id' => $product->id])}}">
                                                            <div class="tpproductdot__termshape">
                                                                <span class="tpproductdot__termshape-bg"></span>
                                                                <span class="tpproductdot__termshape-border"></span>
                                                            </div>
                                                        </a>
                                                        <a class="tpproductdot__variationitem"
                                                            href="{{route('product-details',['id' => $product->id])}}">
                                                            <div class="tpproductdot__termshape">
                                                                <span
                                                                    class="tpproductdot__termshape-bg red-product-bg"></span>
                                                                <span
                                                                    class="tpproductdot__termshape-border red-product-border"></span>
                                                            </div>
                                                        </a>
                                                        <a class="tpproductdot__variationitem"
                                                            href="{{route('product-details',['id' => $product->id])}}">
                                                            <div class="tpproductdot__termshape">
                                                                <span
                                                                    class="tpproductdot__termshape-bg orange-product-bg"></span>
                                                                <span
                                                                    class="tpproductdot__termshape-border orange-product-border"></span>
                                                            </div>
                                                        </a>
                                                        <a class="tpproductdot__variationitem"
                                                            href="{{route('product-details',['id' => $product->id])}}">
                                                            <div class="tpproductdot__termshape">
                                                                <span
                                                                    class="tpproductdot__termshape-bg purple-product-bg"></span>
                                                                <span
                                                                    class="tpproductdot__termshape-border purple-product-border"></span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="tpproduct__rating">
                                                        <ul>
                                                            <li>
                                                                <a href="#"><i class="fas fa-star"></i></a>
                                                                <a href="#"><i class="fas fa-star"></i></a>
                                                                <a href="#"><i class="fas fa-star"></i></a>
                                                                <a href="#"><i class="fas fa-star"></i></a>
                                                                <a href="#"><i class="far fa-star"></i></a>
                                                            </li>
                                                            <li>
                                                                <span>(81)</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="basic-pagination text-center pb-50">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="shop-2.html">
                                            <i class="fal fa-long-arrow-left"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shop-2.html">01</a>
                                    </li>
                                    <li>
                                        <span class="current">02</span>
                                    </li>
                                    <li>
                                        <a href="shop-2.html">- - -</a>
                                    </li>
                                    <li>
                                        <a href="shop-2.html">07</a>
                                    </li>
                                    <li>
                                        <a href="shop-2.html">08</a>
                                    </li>
                                    <li>
                                        <a href="shop-2.html">
                                            <i class="fal fa-long-arrow-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter Section Start -->

            <div class="col-lg-2 col-md-12">
                <div class="tpsidebar product-sidebar__product-category">
                    <div class="product-sidebar">
                        <!-- <div class="product-sidebar__widget mb-30">
                            <div class="product-sidebar__info product-info-list">
                                <h4 class="product-sidebar__title mb-25">Category</h4>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Kids (10)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Mens (23)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked3">
                                    <label class="form-check-label" for="flexCheckChecked3">
                                        Womens (14)
                                    </label>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="product-sidebar__widget mb-30">
                            <div class="product-sidebar__info product-info-list">
                                <h4 class="product-sidebar__title mb-30">Filter</span>
                                </h4>
                                <div class="productsidebar">
                                    <div class="productsidebar__head">
                                    </div>
                                    <div class="productsidebar__range">
                                        <div id="slider-range"></div>
                                        <div class="price-filter mt-10"><input type="text" id="amount">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="product-sidebar__widget mb-30">
                            <div class="product-sidebar__info product-info-list">
                                <h4 class="product-sidebar__title mb-20">Category</h4>
                                @foreach ($categories as $category)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault5">
                                    <label class="form-check-label" for="flexCheckDefault5">
                                        {{$category->name}}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="product-sidebar__widget mb-30 d-none">
                            <div class="product-sidebar__info product-info-list">
                                <h4 class="product-sidebar__title mb-20">Color</h4>
                                @foreach ($categories as $category)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault8">
                                    <label class="form-check-label" for="flexCheckDefault8">
                                        {{$category->name}}
                                    </label>
                                    <span class="f-right"><i class="far fa-angle-down"></i></span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- <div class="product-sidebar__widget mb-30">
                            <div class="product-sidebar__info">
                                <h4 class="product-sidebar__title mb-20">Color</h4>
                                <div class="form-check">
                                    <input class="form-check-input black-input" type="checkbox" value=""
                                        id="flexCheckDefault12">
                                    <label class="form-check-label" for="flexCheckDefault12">
                                        Black
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input blue-input" type="checkbox" value=""
                                        id="flexCheckChecked13">
                                    <label class="form-check-label" for="flexCheckChecked13">
                                        Blue
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input grey-input" type="checkbox" value=""
                                        id="flexCheckChecked14">
                                    <label class="form-check-label" for="flexCheckChecked14">
                                        Gray
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input green-input" type="checkbox" value=""
                                        id="flexCheckChecked15">
                                    <label class="form-check-label" for="flexCheckChecked15">
                                        Green
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input red-input" type="checkbox" value=""
                                        id="flexCheckChecked16">
                                    <label class="form-check-label" for="flexCheckChecked16">
                                        Red
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input yellow-input" type="checkbox" value=""
                                        id="flexCheckChecked17">
                                    <label class="form-check-label" for="flexCheckChecked17">
                                        Yellow
                                    </label>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="product-sidebar__widget mb-30">
                            <div class="product-sidebar__brand">
                                <h4 class="product-sidebar__title mb-20">Brand</h4>
                                <div class="form-check">
                                    <label class="form-check-label" for="flexCheckDefault12">
                                        <a href="#">Alexander McQueen</a>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label" for="flexCheckChecked13">
                                        <a href="#">Adidas</a>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label" for="flexCheckChecked14">
                                        <a href="#">Balenciaga</a>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label" for="flexCheckChecked15">
                                        <a href="#">Balmain</a>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label" for="flexCheckChecked16">
                                        <a href="#">Burberry</a>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label" for="flexCheckChecked17">
                                        <a href="#">Chloé</a>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label" for="flexCheckChecked17">
                                        <a href="#">Dsquared2</a>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label" for="flexCheckChecked17">
                                        <a href="#">Givenchy</a>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label" for="flexCheckChecked17">
                                        <a href="#">Kenzo</a>
                                    </label>
                                </div>
                            </div>
                        </div> -->
                        <div class="product-sidebar__widget mb-30">
                            <div class="product-sidebar__info product-info-list product-color-list">
                                <h4 class="product-sidebar__title mb-20">Price</h4>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault18">
                                    <label class="form-check-label" for="flexCheckDefault18">
                                        $10.00 - $49.00
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked19">
                                    <label class="form-check-label" for="flexCheckChecked19">
                                        $10.00 - $49.00
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked20">
                                    <label class="form-check-label" for="flexCheckChecked20">
                                        $10.00 - $49.00
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked21">
                                    <label class="form-check-label" for="flexCheckChecked21">
                                        $10.00 - $49.00
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- product-area-end -->
@endsection