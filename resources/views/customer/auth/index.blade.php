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
                        <span>Login/Register</span>
                    </div>
                    <h2 class="tp-breadcrumb__title">Login/Register</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb-area-end -->

<!-- about-area-start -->
<section class="about-area pt-80  pb-40">
    <div class="container">
        <div class="tpabout__inner-logo p-relative">
            <div class="row">
                <div class="col-lg-6">
                    <form class="card login-form" action="{{route('customer.login')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="title">
                                <h3>Login Now</h3>
                                <p>You can login using your social media account or email address.</p>
                            </div>
                            <div class="tpcontact__input mb-20">
                                <label for="reg-fn">Email</label>
                                <input class="form-control" type="email" name="email" id="reg-email" required>
                            </div>
                            <div class="tpcontact__input mb-20">
                                <label for="reg-fn">Password</label>
                                <input class="form-control" type="password" name="password" id="reg-pass" required>
                                <p class="text-danger">{{session('message')}}</p>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between bottom-content mb-20">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input width-auto" id="exampleCheck1">
                                    <label class="form-check-label">Remember me</label>
                                </div>
                                <a class="lost-pass" href="#">Forgot password?</a>
                            </div>
                            <div class="tpcontact__submit">
                                <button class="tp-btn tp-color-btn tp-wish-cart" type="submit">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="register-form">
                        <div class="title">
                            <h3>No Account? Register</h3>
                            <p>Registration takes less than a minute but gives you full control over your orders.</p>
                        </div>
                        <form class="row" action="{{route('customer.register')}}" method="post">
                            @csrf
                            <div class="col-12">
                                <div class="tpcontact__input mb-20">
                                    <label for="reg-fn">Your Name</label>
                                    <input class="form-control" type="text" name="name" id="reg-fn" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="tpcontact__input mb-20">
                                    <label for="reg-email">E-mail Address</label>
                                    <input class="form-control" name="email" type="email" id="reg-email" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="tpcontact__input mb-20">
                                    <label for="reg-phone">Phone Number</label>
                                    <input class="form-control" name="phone" type="text" id="reg-phone" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="tpcontact__input mb-20">
                                    <label for="reg-pass">Password</label>
                                    <input class="form-control" name="password" type="password" id="reg-pass" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="tpcontact__input mb-20">
                                    <label for="reg-pass-confirm">Confirm Password</label>
                                    <input class="form-control" name="password_confirmation" type="password"
                                        id="reg-pass-confirm" required>
                                </div>
                            </div>
                            <div class="tpcontact__submit">
                                <button class="tp-btn tp-color-btn tp-wish-cart" type="submit">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endsection