@extends('layouts.appwide')

@section('breadcrumb')
   <!-- Breadcrumb Start-->
   <ul class="breadcrumb">
    <li itemscope itemtype=""><a href="index.html" itemprop="url"><span itemprop="title"><i class="fa fa-home"></i></span></a></li>
    <li itemscope itemtype=""><a href="category.html" itemprop="url"><span itemprop="title">الکترونیکی</span></a></li>
    <li itemscope itemtype=""><a href="product.html" itemprop="url"><span itemprop="title">لپ تاپ ایلین ور</span></a></li>
  </ul>
  <!-- Breadcrumb End--> 
@endsection

@push('customScript')
  <link rel="stylesheet" href="{{ asset('PubAdmin/MaterialDesign/css/CheckBox.css') }}">
  <link rel="stylesheet" href="{{ asset('PubAdmin/MaterialDesign/css/materialdesignicons.css') }}">
  <script src="{{ asset('Default/js/WishList.js') }}"></script>
@endpush

@section('content')
      <!--Middle Part Start-->
      <div id="content" class="col-sm-9">
        <div itemscope itemtype="http://schema.org/محصولات">
        <h1 class="title" itemprop="name"> {{ $product->name }} </h1>
          <div class="row product-info">
            <div class="col-sm-6">

              <div class="image">
                <img class="img-responsive" itemprop="image" id="zoom_01" src="{{ $product->image }}" title="{ $product->name }}" alt="{{ $product->name }}" data-zoom-image="{{ $product->image }}" /> 
              </div>

              <div class="center-block text-center"><span class="zoom-gallery"><i class="fa fa-search"></i> برای مشاهده گالری روی تصویر کلیک کنید</span></div>

              <!-- Image Gallery Start !-->
              <div class="image-additional" id="gallery_01"> 
                <a class="thumbnail" href="#" data-zoom-image="/Default/image/product/macbook_air_4-500x500.jpg" data-image="/Default/image/product/macbook_air_4-500x500.jpg" title="لپ تاپ ایلین ور">
                  <img src="/Default/image/product/macbook_air_4-66x66.jpg" title="لپ تاپ ایلین ور" alt="لپ تاپ ایلین ور" />
                </a>
              </div>
              <!-- Image Gallery End !-->
            </div>

            <!-- Product Properties Start !-->
            <div class="col-sm-6">
              <ul class="list-unstyled description custom-descr">
                <span class="prop-box-label">مشخصات اصلی </span>
                <li style="margin-top: 8px;"><b>برند :</b> <a href="#"><span itemprop="brand">{{ $product->brand }}</span></a></li>
                <li style="margin-top: 8px;"><b>کد محصول :</b> <span itemprop="mpn">محصولات {{ $product->id }}</span></li>
                <li style="margin-top: 8px;">
                  <b>وضعیت موجودی :</b>
                  @if($product->status == '1')
                    <span class="instock" style="background: #06aa20 !important; padding: 8px;border-radius: 7px;">موجود</span>
                 @else
                    <span class="instock" style="background:#aa060d !important; padding: 8px;border-radius: 7px;">ناموجود</span>
                    
                 @endif
                </li>
              </ul>

              <ul class="price-box">
                <span class="price-box-label">قیمت محصول</span>
                <li class="price" itemprop="offers" itemscope style="position:relative;">
                
                  @if($product->discount != 0)
                     <span class="price-old" style="position: absolute;left: 5px;top: 50%;">{{ number_format($product->price)     . "تومان" }}</span>
                     <span itemprop="price" style="position: absolute;right: 5px;top: 50%;">{{  number_format($product->dis_price) . "تومان" }}</span>
                     
                     
                  @else
                     <span itemprop="price" style="position: absolute;right: 5px;top: 50%;">{{ number_format($product->dis_price)  . "تومان"}}</span>
                  @endif
                </li>
                <li></li>
              </ul>

              <div id="product">
                <h3 class="subtitle"></h3>
                <!-- Product Properties End !-->

              
                <div class="cart" style="position: relative; padding-bottom: 55px;">
                  <div>
                    <div class="qty">
                      <label class="control-label" for="input-quantity">تعداد</label>
                      <input type="text" name="quantity" value="1" size="2" id="input-quantity" class="form-control">
                      <a class="qtyBtn plus" href="javascript:void(0);">+</a><br>
                      <a class="qtyBtn mines" href="javascript:void(0);">-</a>
                      <div class="clear"></div>
                    </div>
                    @if($product->status != 1)
                    <button type="button" id="button-cart" class="btn btn-primary btn-lg add-to-basket-pos basket-deactive" title="محصول ناموجود است" >  افزودن به سبد </button>
                    @else
                      <button type="button" id="button-cart" class="btn btn-primary btn-lg add-to-basket-pos" style="right:28% !important;" title="برای افزودن به سبد کلیک کنید">افزودن به سبد خرید</button>
                    @endif
                 </div>
                  <div class="wish-holder">
                    <button type="button" class="add-to-wish-list wishlist add-wish" data-id="{{ $product->id }}"><i class="fa fa-heart"></i> افزودن به علاقه مندی ها</button>
                  </div>
                </div>


              </div>
              <div class="rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                <meta itemprop="ratingValue" content="0" />
                <p>

                      @php $countOfAll=App\Comment::where('product_id', $product->id)->where('shared', '1')->count(); @endphp
                      <span itemprop="reviewCount">{{ $countOfAll}} دیدگاه</span></a> 
                      / 
                      <a onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;" href="">یک دیدگاه بنویسید</a></p>
              </div>
              <hr>
            </div>
          </div>

          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-description" data-toggle="tab">توضیحات</a></li>
            @if($properties['hasProp'] == true)
              <li><a href="#tab-specification" data-toggle="tab">مشخصات</a></li>
            @endif            
            
            <li>
              <a href="#tab-review" data-toggle="tab">
                  دیدگاه ها
                ({{ $countOfAll }})
              </a>
            </li>
          </ul>

          <!-- Properties (Filters) Start !-->
          <div class="tab-content">
            <div itemprop="description" id="tab-description" class="tab-pane active">
              <div>
              <p><b>{{ $product->name }} :</b></p>
              <p>{{ $product->body }}</p>
              </div>
            </div>
            @if($properties['hasProp'] == true)
                  <div id="tab-specification" class="tab-pane">

                    @foreach ($properties['parentFilters'] as $parentFilter)
                    
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                          <td class="main-filter" colspan="2"><strong>{{ $parentFilter->persian_name }}</strong></td>
                          </tr>
                        </thead>
                        <tbody>

                          @if($parentFilter->sub_filters->count() != 0)
                            @foreach($parentFilter->sub_filters as $subFilter)
                            
                            @php $filterValue=\App\ProductFilter::where('filter_id', $subFilter->id)->where('product_id' ,$product->id)->first(); @endphp
                            
                            <tr>
                              @if($filterValue != null && $filterValue->count() != 0)
                            <td>{{ $subFilter->persian_name }}</td>
                                <td>

                                  @if($subFilter->type == '0')
                                      {{ $filterValue->value  }}
                                  @else

                                          @if($filterValue->value == '1')
                                          ندارد
                                          {{-- <i class="icon-ok"> --}}
                                          @else
                                              دارد
                                              {{-- <i class="icon-remove-sign">  --}}
                                          @endif

                                  @endif

                                </td>

                              @endif
                            </tr>
                            @endforeach
                          @endif
                        </tbody>
                      </table>
                     @endforeach
                </div>
            @endif
              <!-- Properties (Filters) End !-->

              <!-- Comments Start !-->
            <div id="tab-review" class="tab-pane">
            
                <div id="review">
                  <div>
                    @if(session()->has('userComment'))
                    @php
                    $userComment=session()->get('userComment');
                    @endphp
                      <table class="table table-striped table-bordered">
                        <tbody>
                          <tr>
                            <td style="width: 50%;">
                                <div class="alert alert-success">
                                  <i class="fa fa-check-circle"></i>
                                  نظر شما ارسال شد و پس از تایید روی وب سایت قرار خواهد گرفت.
                                <div>
                            </td>
                          </tr>

                          <tr>
                            <td colspan="2"><p>
                             {{ $userComment->body }}
                            </p>
                              <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> </div></td>
                          </tr>
                        </tbody>
                      </table>
                    @endif
            @if($productComments->count() != 0)
                 @foreach ($productComments as $productComment)
                 @php 
                    $createTime = new Verta($productComment->created_at);
                    Verta::setStringformat('Y/n/j');
                 @endphp
                    <table class="table table-striped table-bordered">
                      <tbody>
                        <tr>
                          <td style="width: 50%;"><strong><span>نام کاربر: {{ $productComment->user->name }}</span></strong></td>
                          <td class="text-right"><span>تاریخ: {{ $createTime }}</span></td>
                        </tr>
                        <tr>
                          <td colspan="2"><p>{{ $productComment->body }}</p>
                              <div class="rating">      
                                @for($i=1; $i <= $productComment->comment_rate; $i++)
                                    <span class="fa fa-stack">
                                      <i class="fa fa-star fa-stack-2x"></i>
                                      <i class="fa fa-star-o fa-stack-2x"></i>
                                    </span> 
                                @endfor

                                @for($i=1; $i<= 5-$productComment->comment_rate; $i++)
                                    <span class="fa fa-stack">
                                      <i class="fa fa-star-o fa-stack-2x"></i>
                                    </span>
                                @endfor
                              </div>
                           </td>
                        </tr>
                      </tbody>
                    </table>
                 @endforeach
             @else
                <div class="alert alert-info">
                  <i class="fa fa-comments"></i>
                  برای این محصول تا کنون دیدگاهی ثبت نشده است   
               </div>
            @endif
                  </div>
                  <div class="text-right"></div>
                  @if($countOfAll > 5)
                    <span> برای مشاهده بیشتر نظرات کلیک کنید </span>
                    {{ $productComments->links() }}
                  @endif
                </div>

                
                    <style>
                    #review nav{
                      display: inline;
                      vertical-align: -12px;
                    }
                    </style>
                @if(Auth::check())
                <form class="form-horizontal" action="{{ route('product.comment', ['product' => $product->id]) }}" method="post">
                  @csrf
                    <h2>یک دیدگاه بنویسید</h2>
                    <div class="form-group required">
                      <div class="col-sm-12">
                        <label for="input-review" class="control-label">دیدگاه شما</label>
                        <textarea class="form-control" id="input-review" rows="5" name="body"></textarea>
                        <div class="help-block"><span class="text-danger">توجه :</span> قبل از ثبت دیدگاه قوانین ثبت دیدگاه را مطالعه فرمایید</div>
                      </div>
                    </div>
                    <div class="form-group required">
                      <div class="col-sm-12" id="comment-view">
                        <label class="control-label">نظر کلی</label>

                        <div class="pretty p-icon p-round">
                          <input type="radio" name="rating" value="5">
                          <div class="state p-success-o" style="display:inline !important;">
                              <label style="margin-left:22px !important">عالی</label>
                              <i class="icon mdi mdi-check"></i>
                          </div>
                      </div>

                      <div class="pretty p-icon p-round">
                        <input type="radio" name="rating" value="4">
                        <div class="state p-primary-o" style="display:inline !important;">
                            <label style="margin-left:22px !important">خیلی خوب</label>
                            <i class="icon mdi mdi-check"></i>
                        </div>
                    </div>

                    <div class="pretty p-icon p-round">
                      <input type="radio" name="rating" value="3">
                      <div class="state p-info-o" style="display:inline !important;">
                          <label style="margin-left:22px !important">مناسب</label>
                          <i class="icon mdi mdi-check"></i>
                      </div>
                  </div>

                  <div class="pretty p-icon p-round">
                    <input type="radio" name="rating" value="2">
                    <div class="state p-warning-o" style="display:inline !important;">
                        <label style="margin-left:22px !important">متوسط</label>
                        <i class="icon mdi mdi-check"></i>
                    </div>
                </div>

                <div class="pretty p-icon p-round">
                  <input type="radio" name="rating" value="1">
                  <div class="state p-danger-o" style="display:inline !important;">
                      <label style="margin-left:22px !important">ضعیف</label>
                      <i class="icon mdi mdi-check"></i>
                  </div>
              </div>

                        
            </div>
                    <div class="buttons">
                      <div class="pull-right">
                        <button class="btn btn-success" id="button-review" type="submit" style="border-radius:5px;">ثبت دیدگاه</button>
                      </div>
                    </div>
              </form>
              @else
              <div>
                برای نوشتن دیدگاه 
                <a href="{{ route('login') }}">وارد</a>
                حساب کاربری خود شوید
              </div>
            </div>
            
            @endif
          </div>
          @include('Default.Product.Product-Detail-RelatedProduct')
        </div>
      </div>
      </div>

      <!--Middle Part End -->   
  
@endsection
 @section('customSidebar')    
  @include('Default.Product.Product-Detail-Aside')
 @endsection