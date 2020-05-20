

<!DOCTYPE html>
<html dir="rtl">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="UTF-8" />
        <meta name="format-detection" content="telephone=no" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="image/favicon.png" rel="icon" />
        <title> @yield('title')</title>
        <meta name="description" content="Responsive and clean html template design for any kind of ecommerce webshop">
        <!-- CSS Part Start-->
        <link rel="stylesheet" type="text/css" href="/Default/js/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="/Default/js/bootstrap/css/bootstrap-rtl.min.css" />
        <link rel="stylesheet" type="text/css" href="/Default/css/font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="/Default/css/stylesheet.css" />
        <link rel="stylesheet" type="text/css" href="/Default/css/owl.carousel.css" />
        <link rel="stylesheet" type="text/css" href="/Default/css/owl.transitions.css" />
        <link rel="stylesheet" type="text/css" href="/Default/css/responsive.css" />
        <link rel="stylesheet" type="text/css" href="/Default/css/stylesheet-rtl.css" />
        <link rel="stylesheet" type="text/css" href="/Default/css/responsive-rtl.css" />
        <script type="text/javascript" src="/Default/js/jquery-2.1.1.min.js"></script>
        @stack('customScript')
        
        <link rel="stylesheet" href="/Default/css/custom-style.css">
        <script src="{{ asset('PubAdmin/js/AlertPlugin/sweetalert.js') }}"></script>
        <!-- CSS Part End-->
        <style> 
       
        </style>
        
        <script src="{{ asset('Default/js/BasketAjax.js') }}"></script>
        
        <script>
            $(window).load(function(){
                $('.preloader').fadeOut('slow');
            });
          </script>

    </head>
    <body>
        <div class="preloader"></div>
        <div class="wrapper-wide">
        <div id="header">
            <!-- Top Bar Start-->
            <nav id="top" class="htop">
                <div class="container">
                    <div class="row">
                        <span class="drop-icon visible-sm visible-xs"><i class="fa fa-align-justify"></i></span>
                        <div class="pull-left flip left-top">
                            <div class="links">
                                <ul>
                                    <li class="mobile"><i class="fa fa-phone"></i>09162913781</li>
                                    <li class="email"><a href="#"><i class="fa fa-envelope"></i>alighorbani20002@gmail.com</a></li>
                                    @auth
                                    <li>
                                        <a href="{{ route('wishlist.index') }}" id="wish-count">
                                        لیست علاقه مندی ها
                                        ({{ $wishLists }})
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('basket.index') }}" id="basket-count">
                                        سبد خرید
                                        ({{ $baskets->count() }})
                                        </a>
                                    </li>
                                    @endauth
                                </ul>
                            </div>
                        </div>
                        <div id="top-links" class="nav pull-right flip">
                            <ul>
                                @if (Route::has('login'))
                                    @auth
                                        <li><a href="{{ route('profile.index') }}">پروفایل کاربری</a></li>
                                @else
                                        <li><a href="{{ route('login') }}">ورود</a></li>
                                        @if (Route::has('register'))
                                             <li><a href="{{ route('register') }}">ثبت نام</a></li>
                                        @endif
                                    @endauth
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Top Bar End-->
            <!-- Header Start-->
            <header class="header-row">
                <div class="container">
                    <div class="table-container">
                        <!-- Logo Start -->
                        <div class="col-table-cell col-lg-6 col-md-6 col-sm-12 col-xs-12 inner" style="position:relative;">
                            <div id="logo">
                                <a href="{{ route('index') }}"><img class="img-responsive" src="{{ asset('Default/image/logo.jpg') }}" title="فروشگاه ایرانیان" alt="فروشگاه ایرانیان" /></a>
                                <div id="title-logo-top">
                                    <h3 id="title-logo-h3">فروشگاه اینترنتی ایرانیان</h3>
                                </div>
                            </div>
                        </div>
                        <!-- Logo End -->
                        <!-- Mini Cart Start-->
                        <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            @auth
                            @if(Route::currentRouteName() != "basket.index" && Route::currentRouteName() != "basket.pay")
                            <div id="cart">
                                <button type="button" data-toggle="dropdown" data-loading-text="Loading..." class="heading dropdown-toggle" style="border-radius: 2px;">
                                <span class="cart-icon pull-left flip"></span>
                                <span id="cart-total" class="el-fix">
                                @if($baskets->count() != 0)
                                {{ $baskets->count() }}
                                محصول - 
                                {{ number_format($sumProduct - $disValue ) }} 
                                تومان
                                @else
                                سبد خرید خالی است
                                @endif
                                </span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <table class="table">
                                            <tbody id="basket-header">
                                                <?php $disValue=0; ?>
                                                @foreach($baskets as $key => $basket)
                                                <tr>
                                                    <td class="text-center"><a href="{{ route('products.show', $basket->product_data->name) }}"><img class="img-thumbnail" title="{{ $basket->product_data->name }}" alt="*" src="{{ $basket->product_data->images }}"></a></td>
                                                    <td class="text-left"><a href="{{ route('products.show', $basket->product_data->name) }}">{{ $basket->product_data->name }}</a></td>
                                                    <td class="text-right el-fix">x {{ $basket->count }}</td>
                                                    <td class="text-right el-fix">{{ number_format($basket->product_data->dis_price) }} تومان </td>
                                                    <td class="text-center">
                                                        <form action="{{ route('basket.destroy', ['basket' => $basket->id]) }}" method="post">@csrf @method('DELETE')<button class="btn btn-danger btn-xs remove" title="حذف" type="submit"><i class="fa fa-times"></i></button></form>
                                                    </td>
                                                </tr>
                                                <?php
                                                    for($i=0; $i < $basket->count; $i++)
                                                    $disValue=$disValue+$basket->product_data->dis_value;
                                                    ?>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </li>
                                    <li>
                                        <div>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td class="text-right"><strong>جمع کل:</strong></td>
                                                    <td class="text-right" id="final-basket-total-price">{{ number_format($sumProduct) }} تومان</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right"><strong>مقدار تخفیف:</strong></td>
                                                    <td class="text-right" id="final-basket-disValue">{{ number_format($disValue) }} تومان</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right"><strong>قابل پرداخت :</strong></td>
                                                    <td class="text-right" id="final-basket-price">{{ number_format($sumProduct - $disValue ) }} تومان</td>
                                                </tr>
                                            </table>
                                            <p class="checkout"><a href="{{ route('basket.index') }}" class="btn btn-success"><i class="fa fa-shopping-cart"></i> مشاهده سبد</a>&nbsp;&nbsp;&nbsp;<a href="{{ route('basket.pay') }}" class="btn btn-warning"><i class="fa fa-share"></i> تسویه حساب</a></p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            @endif
                            @endauth
                        </div>
                        <!-- Mini Cart End-->
                        <!-- SearchBox Start-->
                        <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12 inner" style="z-index:200;">
                            <div id="search" class="input-group">
                                <input id="filter_name" type="search" name="search"  placeholder="دنبال چی میگردی..."  class="form-control input-lg"  style="border-radius: 4px !important;">
                                <button type="button" class="button-search"><i class="fa fa-search"></i></button>
                                <div id="search-wrapper">
                                </div>
                            </div>
                        </div>
                        <!-- SearchBox End-->
                    </div>
                </div>
            </header>
            <!-- Header End-->
            <!-- Navigation Start-->
            <div class="container">
                <nav id="menu" class="navbar">
                    <div class="navbar-header"> <span class="visible-xs visible-sm"> منو <b></b></span></div>
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav">
                            <li class="i-home"><a class="home_link i-i-home" title="صفحه اصلی" href="{{ route('index') }}"><span></span></a></li>
                            <li class="mega-menu dropdown">
                                <a>محصولات</a>
                                <div class="dropdown-menu">
                                    @foreach($categories as $key => $category)
                                    <div class="column col-lg-2 col-md-3">
                                        <a href="#">{{ $category->title }}</a>
                                        @if($category->sub_categories->count() != 0)
                                        <div>
                                            <ul>
                                                @foreach ($category->sub_categories as $subCategory)
                                                <li>
                                                    <a href="{{ route('category.product', $subCategory->title) }}">
                                                    {{ $subCategory->title }}
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @else
                                        <b style="margin-top: 10px;display: table">زیر گروهی وجود ندارد</b>
                                        @endif
                                    </div>
                                    @if($key == 5)
                                    <div class="clearfix visible-lg-block"></div>
                                    @endif
                                    @endforeach
                                </div>
                            </li>
                            @auth
                            <li><a href="{{ route('wishlist.index') }}">لیست علاقه مندی ها</a></li>
                            @endauth
                            <li><a href="{{ route('faq') }}">سوالات متداول</a></li>
                            <li class="contact-link"><a href="{{ route('contact.us') }}">تماس با ما</a></li>
                            <li><a href="about-us.html">درباره ما</a></li>
                            <li class="custom-link-right"><a href="#" target="_blank">پیشنهاد های شگفت انگیز!!</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <!-- Navigation End-->
        </div>

