<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
<title>Underwear Shop</title>
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:title" content="">
<meta property="og:type" content="">
<meta property="og:url" content="">
<meta property="og:image" content="">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/theme/favicon.ico') }}">
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
@livewireStyles
</head>

<body>
    <header class="header-area header-style-1 header-height-2">
        @auth
        <div class="header-top header-top-ptb-1 d-none d-lg-block">
           
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info">
                        {{-- <ul>
                                <li>
                                    <a class="language-dropdown-active" href="#"> <i class="fi-rs-world"></i> English <i class="fi-rs-angle-small-down"></i></a>
                                    <ul class="language-dropdown">
                                        <li><a href="#"><img src="assets/imgs/theme/flag-fr.png" alt="">Français</a></li>
                                        <li><a href="#"><img src="assets/imgs/theme/flag-dt.png" alt="">Deutsch</a></li>
                                        <li><a href="#"><img src="assets/imgs/theme/flag-ru.png" alt="">Pусский</a></li>
                                    </ul>
                                </li>                                
                            </ul> --}}
                        </div>
                    </div>
                  
                    {{-- <div class="col-xl-6 col-lg-4">
                        <div class="text-center">
                            <div id="news-flash" class="d-inline-block p-1">
                                <ul >
                                    <li >Underwear of different types<a href="{{route ('shop')}}">  in more detail</a></li>
                                    <li>Super Offer</li>
                                    <li>Awaken your femininity<a href="{{route ('shop') }}"> Buy Now</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info header-info-right">
                            <ul>                                
                                <li>
                                    <i class="fi-rs-user"></i>{{ Auth::user()->name }}  / 
                                    <form action="{{ route ('logout')}}" method="post">
                                    @csrf
                                    <a href="{{route ('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">Log out</a>

                                    </form>
                                
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endauth

        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="/"><img src="{{asset ('assets/imgs/logo/msmlogo.jpg')}}" alt="logo" ></a>
                       
                    </div>
                    <div class="header-right">
                      @livewire('header-search-component')
                        <div class="header-action-right">
                            <div class="header-action-2">
                                @livewire('wish-list-icon-component')
                               @livewire('cart-icon-component')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="/"><img src="{{asset ('assets/imgs/logo/msmlogo.jpg')}}" alt="logo"></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        <div class="main-categori-wrap d-none d-lg-block">
                            <a class="categori-button-active" href="#">
                                <span class="fi-rs-apps"></span> Search category
                            </a>
                    @php
                        $categories = App\Models\Category::all();
                    @endphp
                            <div class="categori-dropdown-wrap categori-dropdown-active-large">
                                <ul>
                                     @foreach ($categories as $category)
                                    <li class="has-children">
                                        <a href="{{route ('product.category', ['slug' => $category->slug])}}"><i class="surfsidemedia-font-dress"></i>{{$category->name}}</a>
                                    </li>
                                    @endforeach 
                                   
                                    
                                    {{-- <li class="has-children">
                                        <a href="shop.html"><i class="surfsidemedia-font-tshirt"></i>Men's Clothing</a>
                                        <div class="dropdown-menu">
                                            <ul class="mega-menu d-lg-flex">
                                                <li class="mega-menu-col col-lg-7">
                                                    <ul class="d-lg-flex">
                                                        <li class="mega-menu-col col-lg-6">
                                                            <ul>
                                                                <li><span class="submenu-title">Jackets & Coats</span></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Down Jackets</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Jackets</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Parkas</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Faux Leather Coats</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Trench</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Wool & Blends</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Vests & Waistcoats</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Leather Coats</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="mega-menu-col col-lg-6">
                                                            <ul>
                                                                <li><span class="submenu-title">Suits & Blazers</span></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Blazers</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Suit Jackets</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Suit Pants</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Suits</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Vests</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Tailor-made Suits</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Cover-Ups</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="mega-menu-col col-lg-5">
                                                    <div class="header-banner2">
                                                        <img src="assets/imgs/banner/menu-banner-4.jpg" alt="menu_banner1">
                                                        <div class="banne_info">
                                                            <h6>10% Off</h6>
                                                            <h4>New Arrival</h4>
                                                            <a href="#">Shop now</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="has-children">
                                        <a href="shop.html"><i class="surfsidemedia-font-smartphone"></i> Cellphones</a>
                                        <div class="dropdown-menu">
                                            <ul class="mega-menu d-lg-flex">
                                                <li class="mega-menu-col col-lg-7">
                                                    <ul class="d-lg-flex">
                                                        <li class="mega-menu-col col-lg-6">
                                                            <ul>
                                                                <li><span class="submenu-title">Hot & Trending</span></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Cellphones</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">iPhones</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Refurbished Phones</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Mobile Phone</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Mobile Phone Parts</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Phone Bags & Cases</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Communication Equipments</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Walkie Talkie</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="mega-menu-col col-lg-6">
                                                            <ul>
                                                                <li><span class="submenu-title">Accessories</span></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Screen Protectors</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Wire Chargers</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Wireless Chargers</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Car Chargers</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Power Bank</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Armbands</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Dust Plug</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Signal Boosters</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="mega-menu-col col-lg-5">
                                                    <div class="header-banner2">
                                                        <img src="assets/imgs/banner/menu-banner-5.jpg" alt="menu_banner1">
                                                        <div class="banne_info">
                                                            <h6>10% Off</h6>
                                                            <h4>New Arrival</h4>
                                                            <a href="#">Shop now</a>
                                                        </div>
                                                    </div>
                                                    <div class="header-banner2">
                                                        <img src="assets/imgs/banner/menu-banner-6.jpg" alt="menu_banner2">
                                                        <div class="banne_info">
                                                            <h6>15% Off</h6>
                                                            <h4>Hot Deals</h4>
                                                            <a href="#">Shop now</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li><a href="shop.html"><i class="surfsidemedia-font-desktop"></i>Computer & Office</a></li>
                                    <li><a href="shop.html"><i class="surfsidemedia-font-cpu"></i>Consumer Electronics</a></li>
                                    <li><a href="shop.html"><i class="surfsidemedia-font-diamond"></i>Jewelry & Accessories</a></li>
                                    <li><a href="shop.html"><i class="surfsidemedia-font-home"></i>Home & Garden</a></li>
                                    <li><a href="shop.html"><i class="surfsidemedia-font-high-heels"></i>Shoes</a></li>
                                    <li><a href="shop.html"><i class="surfsidemedia-font-teddy-bear"></i>Mother & Kids</a></li>
                                    <li><a href="shop.html"><i class="surfsidemedia-font-kite"></i>Outdoor fun</a></li>
                                    <li>
                                        <ul class="more_slide_open" style="display: none;">
                                            <li><a href="shop.html"><i class="surfsidemedia-font-desktop"></i>Beauty, Health</a></li>
                                            <li><a href="shop.html"><i class="surfsidemedia-font-cpu"></i>Bags and Shoes</a></li>
                                            <li><a href="shop.html"><i class="surfsidemedia-font-diamond"></i>Consumer Electronics</a></li>
                                            <li><a href="shop.html"><i class="surfsidemedia-font-home"></i>Automobiles & Motorcycles</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="more_categories">Show more...</div> --}}
                            </div>
                        </div>
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li><a @if (Route::currentRouteName() == "home.index") class="active" @endif href="/">Home </a></li>

                                    <li><a @if (Route::currentRouteName() == "shop") class="active" @endif  href="{{route('shop')}}">Shop</a></li>

                                    {{-- <li class="position-static"><a href="#">Our Collections <i class="fi-rs-angle-down"></i></a>
                                        <ul class="mega-menu">
                                            <li class="sub-mega-menu sub-mega-menu-width-22">
                                                <a class="menu-title" href="#">Women's Fashion</a>
                                                <ul>
                                                    <li><a href="product-details.html">Dresses</a></li>
                                                    <li><a href="product-details.html">Blouses & Shirts</a></li>
                                                    <li><a href="product-details.html">Hoodies & Sweatshirts</a></li>
                                                    <li><a href="product-details.html">Wedding Dresses</a></li>
                                                    <li><a href="product-details.html">Prom Dresses</a></li>
                                                    <li><a href="product-details.html">Cosplay Costumes</a></li>
                                                </ul>
                                            </li>
                                            <li class="sub-mega-menu sub-mega-menu-width-22">
                                                <a class="menu-title" href="#">Men's Fashion</a>
                                                <ul>
                                                    <li><a href="product-details.html">Jackets</a></li>
                                                    <li><a href="product-details.html">Casual Faux Leather</a></li>
                                                    <li><a href="product-details.html">Genuine Leather</a></li>
                                                    <li><a href="product-details.html">Casual Pants</a></li>
                                                    <li><a href="product-details.html">Sweatpants</a></li>
                                                    <li><a href="product-details.html">Harem Pants</a></li>
                                                </ul>
                                            </li>
                                            <li class="sub-mega-menu sub-mega-menu-width-22">
                                                <a class="menu-title" href="#">Technology</a>
                                                <ul>
                                                    <li><a href="product-details.html">Gaming Laptops</a></li>
                                                    <li><a href="product-details.html">Ultraslim Laptops</a></li>
                                                    <li><a href="product-details.html">Tablets</a></li>
                                                    <li><a href="product-details.html">Laptop Accessories</a></li>
                                                    <li><a href="product-details.html">Tablet Accessories</a></li>
                                                </ul>
                                            </li>
                                            <li class="sub-mega-menu sub-mega-menu-width-34">
                                                <div class="menu-banner-wrap">
                                                    <a href="product-details.html"><img src="assets/imgs/banner/menu-banner.jpg" alt="Surfside Media"></a>
                                                    <div class="menu-banner-content">
                                                        <h4>Hot deals</h4>
                                                        <h3>Don't miss<br> Trending</h3>
                                                        <div class="menu-banner-price">
                                                            <span class="new-price text-success">Save to 50%</span>
                                                        </div>
                                                        <div class="menu-banner-btn">
                                                            <a href="product-details.html">Shop now</a>
                                                        </div>
                                                    </div>
                                                    <div class="menu-banner-discount">
                                                        <h3>
                                                            <span>35%</span>
                                                            off
                                                        </h3>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li> --}}                                  
                                    <li><a href="#contact">Contact</a></li>
                                    @auth
                                    <li><a href="#">My Account<i class="fi-rs-angle-down"></i></a>
                                        
                                        @if(Auth::user()->utype == 'admin')
                                        <ul class="sub-menu">
                                            <li><a href="{{route ('admin.dashboard')}}">Dashboard</a></li>
                                            <li><a href="{{ route ('admin.products') }}">Products</a></li>
                                            <li><a href="{{route ('admin.categories')}}">Categories</a></li>
                                            <li><a href="{{route ('admin.home.slider')}}">Manage Slider</a></li>
                                            <li><a href="#">Coupons</a></li>
                                            <li><a href="#">Orders</a></li>
                                            <li><a href="#">Customers</a></li>
                                                                                  
                                        </ul>
                                        @else 
                                        <ul class="sub-menu">
                                            <li><a href="{{route ('user.dashboard')}}">Dashboard</a></li>
                                                                             
                                        </ul>
                                        @endif
                                       
                                    </li>
                                    @endauth
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="hotline d-none d-lg-block">
                        <p><i class="fi-rs-smartphone"></i><span>Phone:</span> (+387) 603028373 </p>
                    </div>
                    <p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%</p>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            @livewire('wish-list-icon-component')
                            @livewire('cart-icon-component')
                            <div class="header-action-icon-2 d-block d-lg-none">
                                <div class="burger-icon burger-icon-white">
                                    <span class="burger-icon-top"></span>
                                    <span class="burger-icon-mid"></span>
                                    <span class="burger-icon-bottom"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="/"><img src="{{asset ('assets/imgs/logo/msmlogo.jpg')}}"  alt="logo"></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    @livewire('header-search-component')
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <div class="main-categori-wrap mobile-header-border">
                        <a class="categori-button-active-2" href="#">
                            <span class="fi-rs-apps"></span> Search categories
                        </a>
                        <div class="categori-dropdown-wrap categori-dropdown-active-small">
                            <ul>
                                @foreach ($categories as $category)
                                    <li> <a href="{{route ('product.category', ['slug' => $category->slug])}}"><i class="surfsidemedia-font-dress"></i>{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="/">Home</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{route ('shop')}}">Shop</a></li>
                            {{-- <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Our Collections</a>
                                <ul class="dropdown">
                                    <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Women's Fashion</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">Dresses</a></li>
                                            <li><a href="product-details.html">Blouses & Shirts</a></li>
                                            <li><a href="product-details.html">Hoodies & Sweatshirts</a></li>
                                            <li><a href="product-details.html">Women's Sets</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Men's Fashion</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">Jackets</a></li>
                                            <li><a href="product-details.html">Casual Faux Leather</a></li>
                                            <li><a href="product-details.html">Genuine Leather</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Technology</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">Gaming Laptops</a></li>
                                            <li><a href="product-details.html">Ultraslim Laptops</a></li>
                                            <li><a href="product-details.html">Tablets</a></li>
                                            <li><a href="product-details.html">Laptop Accessories</a></li>
                                            <li><a href="product-details.html">Tablet Accessories</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li> --}}
                            {{-- <li class="menu-item-has-children"><span class="menu-expand"></span><a href="blog.html">Blog</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Language</a>
                                <ul class="dropdown">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                    <li><a href="#">Spanish</a></li>
                                </ul>
                            </li> --}}
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap mobile-header-border">
                    <div class="single-mobile-header-info mt-30">
                        <a href="#contact"> Contact </a>
                    </div>
                    {{-- <div class="single-mobile-header-info">
                        <a href="{{route('login')}}">Login </a>                        
                    </div>
                    <div class="single-mobile-header-info">                        
                        <a href="{{route('register')}}">Register</a>
                    </div> --}}
                    <div class="single-mobile-header-info">
                        <a href="#">(+387) 603028373 </a>
                    </div>
                </div>
                <div class="mobile-social-icon">
                    <h5 class="mb-15 text-grey-4">Follow us</h5>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                </div>
            </div>
        </div>
    </div>        

    
    {{$slot}}

    
    <footer class="main">
        <section class="newsletter p-30 text-white wow fadeIn animated">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 mb-md-3 mb-lg-0">
                        <div class="row align-items-center">
                            <div class="col flex-horizontal-center">
                                <img class="icon-email" src="assets/imgs/theme/icons/icon-email.svg" alt="">
                                <h4 class="font-size-20 mb-0 ml-3">Register on Newsletter</h4>
                            </div>
                            <div class="col my-4 my-md-0 des">
                                <h5 class="font-size-15 ml-4 mb-0">...and get<strong> 10% coupon for first buy.</strong></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <!-- Subscribe Form -->
                        <form class="form-subcriber d-flex wow fadeIn animated">
                            <input type="email" class="form-control bg-white font-small" placeholder="Write Email">
                            <button class="btn bg-dark text-white" type="submit">Subscribe</button>
                        </form>
                        <!-- End Subscribe Form -->
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding footer-mid">
            <div class="container pt-15 pb-20">
                <div id="contact" class="row">
                    <div class="col-lg-4  text-center">
                        <div class="widget-about font-md mb-md-5 mb-lg-0">
                            <div class="logo logo-width-1 wow fadeIn animated">
                                <a href="/"><img src="{{asset ('assets/imgs/logo/msmlogo.jpg')}}" alt="logo"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mob-center">
                        <div>
                            <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated f-16">Contact</h5>
                        <p class="wow fadeIn animated text-start">
                            <strong>Adress: </strong>Banja Luka bb
                        </p>
                        <p class="wow fadeIn animated text-start">
                            <strong>Phone: </strong>065584789
                        </p>
                        <p class="wow fadeIn animated text-start">
                            <strong>Email: </strong>losmikovac@hotmail.com
                        </div>
                        </p>
                    </div>
                   
                    <div class="col-lg-4 mob-center  text-center">
                        <h5 class="mb-10 mt-30 fw-600 text-grey-4 wow fadeIn animated f-16">Follow us!</h5>
                        <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                            <a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                            {{-- <a href="#"><img src="assets/imgs/theme/icons/icon-twitter.svg" alt=""></a> --}}
                            <a href="#"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                            {{-- <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container pb-20 wow fadeIn animated mob-center">
            <div class="row">
                <div class="col-12 mb-20">
                    <div class="footer-bottom"></div>
                </div>
              
                <div class="col-lg-12">
                    <p class="text-lg-center text-center font-sm text-muted mb-0">
                        &copy; <strong class="text-brand">Michada</strong> All rights reserved
                    </p>
                </div>
            </div>
        </div>
    </footer>    
    <!-- Vendor JS-->
<script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/slick.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.syotimer.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/wow.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/js/plugins/magnific-popup.js') }}"></script>
<script src="{{ asset('assets/js/plugins/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/waypoints.js') }}"></script>
<script src="{{ asset('assets/js/plugins/counterup.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/images-loaded.js') }}"></script>
<script src="{{ asset('assets/js/plugins/isotope.js') }}"></script>
<script src="{{ asset('assets/js/plugins/scrollup.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.vticker-min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.theia.sticky.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.elevatezoom.js') }}"></script>

<script src="{{ asset('assets/js/main.js?v=3.3') }}"></script>
<script src="{{ asset('assets/js/shop.js?v=3.3') }}"></script>

@livewireScripts
@stack('scripts')
</body>

</html>