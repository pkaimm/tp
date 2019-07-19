<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <title>Mstore - Online Shop Mobile Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1  maximum-scale=1 user-scalable=no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="HandheldFriendly" content="True">

    <link rel="stylesheet" href="{{asset('/mstore/css/materialize.css')}}">
    <link rel="stylesheet" href="{{asset('/mstore/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/mstore/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('/mstore/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('/mstore/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('/mstore/css/owl.transitions.css')}}">
    <link rel="stylesheet" href="{{asset('/mstore/css/fakeLoader.css')}}">
    <link rel="stylesheet" href="{{asset('/mstore/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('/mstore/css/style.css')}}">

    <link rel="shortcut icon" href="{{asset('/mstore/img/favicon.png')}}">

</head>
<body>

<!-- navbar top -->
<div class="navbar-top">
    <!-- site brand	 -->
    <div class="site-brand">
        <a href="index.html"><h1>订单详情</h1></a>
    </div>
    <!-- end site brand	 -->
    <div class="side-nav-panel-right">
        <a href="#" data-activates="slide-out-right" class="side-nav-left"><i class="fa fa-user"></i></a>
    </div>
</div>
<!-- end navbar top -->

<!-- side nav right-->
<div class="side-nav-panel-right">
    <ul id="slide-out-right" class="side-nav side-nav-panel collapsible">
        <li class="profil">
            <img src="{{asset('/mstore/img/profile.jpg')}}" alt="">
            <h2>John Doe</h2>
        </li>
        <li><a href="setting.html"><i class="fa fa-cog"></i>Settings</a></li>
        <li><a href="about-us.html"><i class="fa fa-user"></i>About Us</a></li>
        <li><a href="contact.html"><i class="fa fa-envelope-o"></i>Contact Us</a></li>
        <li><a href="login.html"><i class="fa fa-sign-in"></i>Login</a></li>
        <li><a href="register.html"><i class="fa fa-user-plus"></i>Register</a></li>
    </ul>
</div>
<!-- end side nav right-->

<!-- navbar bottom -->
<div class="navbar-bottom">
    <div class="row">
        <div class="col s2">
            <a href="index.html"><i class="fa fa-home"></i></a>
        </div>
        <div class="col s2">
            <a href="wishlist.html"><i class="fa fa-heart"></i></a>
        </div>
        <div class="col s4">
            <div class="bar-center">
                <a href="#animatedModal" id="cart-menu"><i class="fa fa-shopping-basket"></i></a>
                <span>2</span>
            </div>
        </div>
        <div class="col s2">
            <a href="contact.html"><i class="fa fa-envelope-o"></i></a>
        </div>
        <div class="col s2">
            <a href="#animatedModal2" id="nav-menu"><i class="fa fa-bars"></i></a>
        </div>
    </div>
</div>
<!-- end navbar bottom -->

<!-- menu -->
<div class="menus" id="animatedModal2">
    <div class="close-animatedModal2 close-icon">
        <i class="fa fa-close"></i>
    </div>
    <div class="modal-content">
        <div class="container">
            <div class="row">
                <div class="col s4">
                    <a href="index.html" class="button-link">
                        <div class="menu-link">
                            <div class="icon">
                                <i class="fa fa-home"></i>
                            </div>
                            Home
                        </div>
                    </a>
                </div>
                <div class="col s4">
                    <a href="product-list.html" class="button-link">
                        <div class="menu-link">
                            <div class="icon">
                                <i class="fa fa-bars"></i>
                            </div>
                            Product List
                        </div>
                    </a>
                </div>
                <div class="col s4">
                    <a href="shop-single.html" class="button-link">
                        <div class="menu-link">
                            <div class="icon">
                                <i class="fa fa-eye"></i>
                            </div>
                            Single Shop
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col s4">
                    <a href="wishlist.html" class="button-link">
                        <div class="menu-link">
                            <div class="icon">
                                <i class="fa fa-heart"></i>
                            </div>
                            Wishlist
                        </div>
                    </a>
                </div>
                <div class="col s4">
                    <a href="cart.html" class="button-link">
                        <div class="menu-link">
                            <div class="icon">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                            Cart
                        </div>
                    </a>
                </div>
                <div class="col s4">
                    <a href="checkout.html" class="button-link">
                        <div class="menu-link">
                            <div class="icon">
                                <i class="fa fa-credit-card"></i>
                            </div>
                            Checkout
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col s4">
                    <a href="blog.html" class="button-link">
                        <div class="menu-link">
                            <div class="icon">
                                <i class="fa fa-bold"></i>
                            </div>
                            Blog
                        </div>
                    </a>
                </div>
                <div class="col s4">
                    <a href="blog-single.html" class="button-link">
                        <div class="menu-link">
                            <div class="icon">
                                <i class="fa fa-file-text-o"></i>
                            </div>
                            Blog Single
                        </div>
                    </a>
                </div>
                <div class="col s4">
                    <a href="error404.html" class="button-link">
                        <div class="menu-link">
                            <div class="icon">
                                <i class="fa fa-hourglass-half"></i>
                            </div>
                            404
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col s4">
                    <a href="testimonial.html" class="button-link">
                        <div class="menu-link">
                            <div class="icon">
                                <i class="fa fa-support"></i>
                            </div>
                            Testimonial
                        </div>
                    </a>
                </div>
                <div class="col s4">
                    <a href="about-us.html" class="button-link">
                        <div class="menu-link">
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>
                            About Us
                        </div>
                    </a>
                </div>
                <div class="col s4">
                    <a href="contact.html" class="button-link">
                        <div class="menu-link">
                            <div class="icon">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            Contact
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col s4">
                    <a href="setting.html" class="button-link">
                        <div class="menu-link">
                            <div class="icon">
                                <i class="fa fa-cog"></i>
                            </div>
                            Settings
                        </div>
                    </a>
                </div>
                <div class="col s4">
                    <a href="login.html" class="button-link">
                        <div class="menu-link">
                            <div class="icon">
                                <i class="fa fa-sign-in"></i>
                            </div>
                            Login
                        </div>
                    </a>
                </div>
                <div class="col s4">
                    <a href="register.html" class="button-link">
                        <div class="menu-link">
                            <div class="icon">
                                <i class="fa fa-user-plus"></i>
                            </div>
                            Register
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end menu -->

<!-- cart menu -->
<div class="menus" id="animatedModal">
    <div class="close-animatedModal close-icon">
        <i class="fa fa-close"></i>
    </div>
    <div class="modal-content">
        <div class="cart-menu">
            <div class="container">
                <div class="content">
                    <div class="cart-1">
                        <div class="row">
                            <div class="col s5">
                                <img src="{{asset('/mstore/img/cart-menu1.png')}}" alt="">
                            </div>
                            <div class="col s7">
                                <h5><a href="">Fashion Men's</a></h5>
                            </div>
                        </div>
                        <div class="row quantity">
                            <div class="col s5">
                                <h5>Quantity</h5>
                            </div>
                            <div class="col s7">
                                <input value="1" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s5">
                                <h5>Price</h5>
                            </div>
                            <div class="col s7">
                                <h5>$20</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s5">
                                <h5>Action</h5>
                            </div>
                            <div class="col s7">
                                <div class="action"><i class="fa fa-trash"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="cart-2">
                        <div class="row">
                            <div class="col s5">
                                <img src="{{asset('/mstore/img/cart-menu2.png')}}" alt="">
                            </div>
                            <div class="col s7">
                                <h5><a href="">Fashion Men's</a></h5>
                            </div>
                        </div>
                        <div class="row quantity">
                            <div class="col s5">
                                <h5>Quantity</h5>
                            </div>
                            <div class="col s7">
                                <input value="1" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s5">
                                <h5>Price</h5>
                            </div>
                            <div class="col s7">
                                <h5>$20</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s5">
                                <h5>Action</h5>
                            </div>
                            <div class="col s7">
                                <div class="action"><i class="fa fa-trash"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="total">
                    <div class="row">
                        <div class="col s7">
                            <h5>Fashion Men's</h5>
                        </div>
                        <div class="col s5">
                            <h5>$21.00</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s7">
                            <h5>Fashion Men's</h5>
                        </div>
                        <div class="col s5">
                            <h5>$21.00</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s7">
                            <h6>Total</h6>
                        </div>
                        <div class="col s5">
                            <h6>$41.00</h6>
                        </div>
                    </div>
                </div>
                <button class="btn button-default">Process to Checkout</button>
            </div>
        </div>
    </div>
</div>
<!-- end cart menu -->


<!-- checkout -->
<div class="checkout pages section">
    <div class="container">
        <div class="pages-head">
            <h3>CHECKOUT</h3>
        </div>
        <div class="checkout-content">
            <div class="row">
                <div class="col s12">
                    <ul class="collapsible" data-collapsible="accordion">
                        <li>
                            <div class="collapsible-header"><h5>4 - 付款方式</h5></div>
                            <div class="collapsible-body">
                                <div class="payment-mode">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur provident repellat</p>
                                    <form action="#" class="checkout-radio">
                                        <div class="input-field">
                                            <input type="radio" class="with-gap" id="bank-transfer" name="group1">
                                            <label for="bank-transfer"><span>Bank Transfer</span></label>
                                        </div>
                                        <div class="input-field">
                                            <input type="radio" class="with-gap" id="cash-on-delivery" name="group1">
                                            <label for="cash-on-delivery"><span>Cash on Delivery</span></label>
                                        </div>
                                        <div class="input-field">
                                            <input type="radio" class="with-gap" id="online-payments" name="group1">
                                            <label for="online-payments"><span>支付宝支付</span></label>
                                        </div>

                                        <a href="" class="btn button-default">继续</a>
                                    </form>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header"><h5>5 - 订单详情</h5></div>
                            <div class="collapsible-body">
                                <div class="order-review">
                                    <div class="row">
                                        <div class="col s12">
                                            <div class="cart-details">
                                                <div class="col s5">
                                                    <div class="cart-product">
                                                        <h5>图片</h5>
                                                    </div>
                                                </div>
                                                <div class="col s7">
                                                    <div class="cart-product">
                                                        @foreach($data as $k=>$v)
                                                        <img src="{{$v->goods_pic}}" alt="">
                                                         @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="cart-details">
                                                <div class="col s5">
                                                    <div class="cart-product">
                                                        <h5>商品名称</h5>
                                                    </div>
                                                </div>
                                                <div class="col s7">
                                                    <div class="cart-product">
                                                      @foreach($data as $k=>$v)
                                                            ===={{$v->goods_name}}====
                                                       @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="cart-details">
                                                <div class="col s5">
                                                    <div class="cart-product">
                                                        <h5>数量</h5>
                                                    </div>
                                                </div>
                                                <div class="col s7">
                                                    <div class="cart-product">
                                                        <input type="text" value="1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="divider"></div>

                                        </div>
                                    </div>
                                </div>
                                <div class="order-review final-price">
                                    <div class="row">
                                        <div class="col s12">

                                            <div class="cart-details">
                                                <div class="col s8">
                                                    <div class="cart-product">
                                                        <h5>总计</h5>
                                                    </div>
                                                </div>
                                                <div class="col s4">
                                                    <div class="cart-product">
                                                        <span>${{$sum}}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="cart-details">
                                                <div class="col s8">
                                                    <div class="cart-product">
                                                        <h5>订单号</h5>
                                                    </div>
                                                </div>
                                                <div class="col s4">
                                                    <div class="cart-product">
                                                        <span>{{$oid}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{url('index/payy')}}?oid={{$oid}}&sum={{$sum}}" class="btn button-default button-fullwidth">前往结算</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end checkout -->


<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="about-us-foot">
            <h6>Mstore</h6>
            <p>is a lorem ipsum dolor sit amet, consectetur adipisicing elit consectetur adipisicing elit.</p>
        </div>
        <div class="social-media">
            <a href=""><i class="fa fa-facebook"></i></a>
            <a href=""><i class="fa fa-twitter"></i></a>
            <a href=""><i class="fa fa-google"></i></a>
            <a href=""><i class="fa fa-linkedin"></i></a>
            <a href=""><i class="fa fa-instagram"></i></a>
        </div>
        <div class="copyright">
            <span>© 2017 All Right Reserved</span>
        </div>
    </div>
</div>
<!-- end footer -->

<!-- scripts -->
<script src="{{asset('/mstore/js/jquery.min.js')}}"></script>
<script src="{{asset('/mstore/js/materialize.min.js')}}"></script>
<script src="{{asset('/mstore/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('/mstore/js/fakeLoader.min.js')}}"></script>
<script src="{{asset('/mstore/js/animatedModal.min.js')}}"></script>
<script src="{{asset('/mstore/js/main.js')}}"></script>

</body>
</html>