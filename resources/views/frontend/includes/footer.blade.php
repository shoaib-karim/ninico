<!-- footer-area-start -->
<footer>
    <div class="footer-area secondary-footer black-bg-2 pt-65">
        <div class="container">
            <div class="main-footer pb-15 mb-30">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="footer-widget footer-col-1 mb-40">
                            <div class="footer-logo mb-30">
                                <a href="index.html"><img src="{{asset('/')}}assets/img/logo/logo-white.png"
                                        alt="logo"></a>
                            </div>
                            <div class="footer-content">
                                <p>Elegant pink origami design three <br> dimensional view and decoration co-exist. <br>
                                    Great for adding a decorative touch to <br> any room’s decor.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="footer-widget footer-col-2 ml-30 mb-40">
                            <h4 class="footer-widget__title mb-30">Information</h4>
                            <div class="footer-widget__links">
                                <ul>
                                    <li><a href="#">Custom Service</a></li>
                                    <li><a href="#">FAQs</a></li>
                                    <li><a href="track.html">Ordering Tracking</a></li>
                                    <li><a href="contact.html">Contacts</a></li>
                                    <li><a href="#">Events</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="footer-widget footer-col-3 mb-40">
                            <h4 class="footer-widget__title mb-30">My Account</h4>
                            <div class="footer-widget__links">
                                <ul>
                                    <li><a href="{{route('customer.login-register')}}">Customer Dashboard</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Discount</a></li>
                                    <li><a href="#">Custom Service</a></li>
                                    <li><a href="#">Terms & Condition</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="footer-widget footer-col-4 mb-40">
                            <h4 class="footer-widget__title mb-30">Social Network</h4>
                            <div class="footer-widget__links">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i>Facebook</a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i>Instagram</a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i>Youtube</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-8">
                        <div class="footer-widget footer-col-5 mb-40">
                            <h4 class="footer-widget__title mb-30">Popular Categories</h4>
                            <div class="footer-widget__links keyword">
                                @foreach ($categories as $category)
                                <a href="{{route('shop',['id' => $category->id])}}">{{$category->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-cta pb-20">
                <div class="row justify-content-between">
                    <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6">
                        <div class="footer-cta__contact">
                            <div class="footer-cta__icon">
                                <i class="far fa-phone"></i>
                            </div>
                            <div class="footer-cta__text">
                                <a href="tel:+880196156758">+880 19 6156 7558</a>
                                <span>Working 8:00 - 22:00</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-8 col-md-8 col-sm-6">
                        <div class="footer-cta__source">
                            <div class="footer-cta__source-content">
                                <h4 class="footer-cta__source-title">Download App on Mobile</h4>
                                <p>15% discount on your first purchase</p>
                            </div>
                            <div class="footer-cta__source-thumb">
                                <a href="#"><img src="{{asset('/')}}assets/img/footer/f-google.jpg" alt="google"></a>
                                <a href="#"><img src="{{asset('/')}}assets/img/footer/f-app.jpg" alt="app"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright black-bg-2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-7 col-md-5">
                        <div class="footer-copyright__content">
                            <span>Copyright 2025 <a href="index.html">©Ninico</a>. All rights reserved. Developed by <a
                                    href="https://shoaibkarim.com">Shoaib</a>.</span>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5 col-md-7">
                        <div class="footer-copyright__brand">
                            <img src="{{asset('/')}}assets/img/footer/f-brand-icon-01.png" alt="footer-brand">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer-area-end -->



<!-- JS here -->
<script src="{{asset('/')}}assets/js/jquery.js"></script>
<script src="{{asset('/')}}assets/js/waypoints.js"></script>
<script src="{{asset('/')}}assets/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('/')}}assets/js/swiper-bundle.js"></script>
<script src="{{asset('/')}}assets/js/slick.js"></script>
<script src="{{asset('/')}}assets/js/magnific-popup.js"></script>
<script src="{{asset('/')}}assets/js/nice-select.js"></script>
<script src="{{asset('/')}}assets/js/counterup.js"></script>
<script src="{{asset('/')}}assets/js/wow.js"></script>
<script src="{{asset('/')}}assets/js/isotope-pkgd.js"></script>
<script src="{{asset('/')}}assets/js/imagesloaded-pkgd.js"></script>
<script src="{{asset('/')}}assets/js/countdown.js"></script>
<script src="{{asset('/')}}assets/js/ajax-form.js"></script>
<script src="{{asset('/')}}assets/js/meanmenu.js"></script>
<script src="{{asset('/')}}assets/js/jquery.knob.js"></script>
<script src="{{asset('/')}}assets/js/main.js"></script>