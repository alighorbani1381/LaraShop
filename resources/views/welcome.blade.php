<style>
    .sliders-custom{
        width:920px !important;
         height:380px !important; 
    }
</style>

@extends('layouts.app')

@section('title')
فروشگاه ایرانیان    
@endsection

@section('content')
    <!--Middle Part Start-->
    <div id="content" class="col-sm-9">

        <!-- Slideshow Start-->
        <div class="slideshow single-slider owl-carousel">
            @foreach($sliders as $slider)
                <div class="item">
                    <a href="{{ $slider->link }}"><img class="img-responsive sliders-custom" src="{{ $slider->picture }}" title="{{ $slider->title }}" alt="{{ $slider->title }}"></a>
                </div>
            @endforeach
        </div>
        <!-- Slideshow End-->

        <!-- Special Product Start -->
        <h3 class="subtitle">ویژه</h3>
        <div class="owl-carousel product_carousel">
            
            @foreach($specialProducts as $specialProduct)
             <div class="product-thumb clearfix">
                 <div class="image">
                 <a href="{{ route('products.show', $specialProduct->name) }}"><img src="{{ $specialProduct->image }}" alt="{{ $specialProduct->name }}" title="{{ $specialProduct->name }}" class="img-responsive" /></a>
                 </div>
                 <div class="caption">
                     <h4><a href="{{ route('products.show', $specialProduct->name) }}">{{ $specialProduct->name }}</a></h4>

                     <p class="price">
                        @if($specialProduct->discount != 0)
                            <span class="price-new">{{ $specialProduct->dis_price }} تومان</span>
                            <span class="price-old">{{ $specialProduct->std_price }} تومان</span>
                            <span class="saving">% {{ $specialProduct->discount }}</span> 
                        @else
                            <span class="price-new">{{ $specialProduct->dis_price }} تومان</span>
                        @endif
                     </p>

                 </div>
                 <div class="button-group">
                 <button class="btn-primary add-to-basket" type="button" data-id="{{ $specialProduct->id }}" ><span>افزودن به سبد</span></button>
                     <div class="add-to-links">
                         <button class="add-to-wish-list" type="button" data-toggle="tooltip" title="افزودن به علاقه مندی ها"><i class="fa fa-heart"></i></button>
                         <button type="button" data-toggle="tooltip" title="مقایسه this محصولات" onClick=""><i class="fa fa-exchange"></i></button>
                     </div>
                 </div>
             </div>
             @endforeach

        </div>
         <!-- Special Product End-->

         <!-- Banner Start !-->
         <div class="marketshop-banner">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <a href="#"><img src="/Default/image/banner/sample-banner-3-400x200.jpg" alt="بنر نمونه 3" title="بنر نمونه 3"></a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <a href="#"><img src="/Default/image/banner/sample-banner-1-400x200.jpg" alt="بنر نمونه" title="بنر نمونه"></a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <a href="#"><img src="/Default/image/banner/sample-banner-2-400x200.jpg" alt="بنر نمونه 2" title="بنر نمونه 2"></a>
                </div>
            </div>
        </div>
        <!-- Banner End !-->

        {{-- <!-- Category Product Start -->
        <div class="category-module" id="latest_category">
            <h3 class="subtitle">الکترونیکی - <a class="viewall" href="category.tpl">نمایش همه</a></h3>
            <div class="category-module-content">
                <ul id="sub-cat" class="tabs">
                    <li><a href="#tab-cat1">لپ تاپ</a></li>
                    <li><a href="#tab-cat2">رومیزی</a></li>
                </ul>

                <div id="tab-cat1" class="tab_content">
                    <div class="owl-carousel latest_category_tabs">
                        <div class="product-thumb">
                            <div class="image">
                                <a href="product.html"><img src="image/product/samsung_tab_1-200x200.jpg" alt="تبلت ایسر" title="تبلت ایسر" class="img-responsive" /></a>
                            </div>
                            <div class="caption">
                                <h4><a href="product.html">تبلت ایسر</a></h4>
                                <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">240000 تومان</span> <span class="saving">-5%</span> </p>
                                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                            </div>
                            <div class="button-group">
                                <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                <div class="add-to-links">
                                    <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                    <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="product-thumb">
                            <div class="image">
                                <a href="product.html"><img src="image/product/macbook_pro_1-200x200.jpg" alt=" کتاب آموزش باغبانی " title=" کتاب آموزش باغبانی " class="img-responsive" /></a>
                            </div>
                            <div class="caption">
                                <h4><a href="product.html"> کتاب آموزش باغبانی </a></h4>
                                <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">120000 تومان</span> <span class="saving">-26%</span> </p>
                            </div>
                            <div class="button-group">
                                <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                <div class="add-to-links">
                                    <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                    <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="product-thumb">
                            <div class="image">
                                <a href="product.html"><img src="image/product/macbook_air_1-200x200.jpg" alt="لپ تاپ ایلین ور" title="لپ تاپ ایلین ور" class="img-responsive" /></a>
                            </div>
                            <div class="caption">
                                <h4><a href="product.html">لپ تاپ ایلین ور</a></h4>
                                <p class="price"> <span class="price-new">10 میلیون تومان</span> <span class="price-old">12 میلیون تومان</span> <span class="saving">-5%</span> </p>
                            </div>
                            <div class="button-group">
                                <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                <div class="add-to-links">
                                    <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                    <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="product-thumb">
                            <div class="image">
                                <a href="product.html"><img src="image/product/macbook_1-200x200.jpg" alt="آیدیا پد یوگا" title="آیدیا پد یوگا" class="img-responsive" /></a>
                            </div>
                            <div class="caption">
                                <h4><a href="product.html">آیدیا پد یوگا</a></h4>
                                <p class="price"> 900000 تومان </p>
                                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                            </div>
                            <div class="button-group">
                                <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                <div class="add-to-links">
                                    <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                    <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="product-thumb">
                            <div class="image">
                                <a href="product.html"><img src="image/product/ipod_shuffle_1-200x200.jpg" alt="لپ تاپ hp پاویلیون" title="لپ تاپ hp پاویلیون" class="img-responsive" /></a>
                            </div>
                            <div class="caption">
                                <h4><a href="product.html">لپ تاپ hp پاویلیون</a></h4>
                                <p class="price"> 122000 تومان </p>
                            </div>
                            <div class="button-group">
                                <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                <div class="add-to-links">
                                    <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                    <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="product-thumb">
                            <div class="image">
                                <a href="product.html"><img src="image/product/ipod_touch_1-200x200.jpg" alt="سامسونگ گلکسی s7" title="سامسونگ گلکسی s7" class="img-responsive" /></a>
                            </div>
                            <div class="caption">
                                <h4><a href="product.html">سامسونگ گلکسی s7</a></h4>
                                <p class="price"> <span class="price-new">62000 تومان</span> <span class="price-old">122000 تومان</span> <span class="saving">-50%</span> </p>
                            </div>
                            <div class="button-group">
                                <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                <div class="add-to-links">
                                    <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                    <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab-cat2" class="tab_content">
                    <div class="owl-carousel latest_category_tabs">
                        <div class="product-thumb">
                            <div class="image">
                                <a href="product.html"><img src="image/product/ipod_shuffle_1-200x200.jpg" alt="لپ تاپ hp پاویلیون" title="لپ تاپ hp پاویلیون" class="img-responsive" /></a>
                            </div>
                            <div class="caption">
                                <h4><a href="product.html">لپ تاپ hp پاویلیون</a></h4>
                                <p class="price"> 122000 تومان </p>
                            </div>
                            <div class="button-group">
                                <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                <div class="add-to-links">
                                    <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                    <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- Category Product End --> --}}


    <!-- New Products Start !-->
    <h3 class="subtitle">جدیدترین</h3>
    <div class="owl-carousel product_carousel">
        
        @foreach($newProducts as $newProduct)
         <div class="product-thumb clearfix">
             <div class="image">
             <a href="{{ route('products.show', $newProduct->name) }}"><img src="{{ $specialProduct->image }}" alt="{{ $newProduct->name }}" title="{{ $newProduct->name }}" class="img-responsive" /></a>
             </div>
             <div class="caption">
                 <h4><a href="{{ route('products.show', $newProduct->name) }}">{{ $newProduct->name }}</a></h4>

                 <p class="price">
                    @if($newProduct->discount != 0)
                        <span class="price-new">{{ $newProduct->dis_price }} تومان</span>
                        <span class="price-old">{{ $newProduct->std_price }} تومان</span>
                        <span class="saving">% {{ $newProduct->discount }}</span> 
                    @else
                        <span class="price-new">{{ $newProduct->dis_price }} تومان</span>
                    @endif
                 </p>

             </div>
             <div class="button-group">
             <button class="btn-primary add-to-basket" type="button" data-id="{{ $newProduct->id }}" ><span>افزودن به سبد</span></button>
                 <div class="add-to-links">
                     <button class="add-to-wish-list" type="button" data-toggle="tooltip" title="افزودن به علاقه مندی ها"><i class="fa fa-heart"></i></button>
                     <button type="button" data-toggle="tooltip" title="مقایسه this محصولات" onClick=""><i class="fa fa-exchange"></i></button>
                 </div>
             </div>
         </div>
         @endforeach

    </div>
     <!-- New Products End !-->

@endsection