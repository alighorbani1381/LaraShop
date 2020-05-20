@extends('layouts.app')

@section('title')
  {{ $category->title }}
@endsection

@section('content')
 <!--Middle Part Start-->
 <div id="content" class="col-sm-9">
 <h1 class="title">{{ $category->title }}</h1>
    <div class="product-filter">
      <div class="row">
        <div class="col-md-3 col-sm-3">
          <div class="btn-group">
            <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="List"><i class="fa fa-th-list"></i></button>
            <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>
          </div>
          <a href="compare.html" id="compare-total">محصولات مقایسه (0)</a> </div>
        <div class="col-sm-2 text-right">
          <label class="control-label" for="input-sort">مرتب سازی :</label>
        </div>
        <div class="col-md-3 col-sm-2 text-right">
          <select id="input-sort" class="form-control col-sm-11">
            <option value="" selected="selected">پیشفرض</option>
            <option value="">نام (الف - ی)</option>
            <option value="">نام (ی - الف)</option>
            <option value="">قیمت (کم به زیاد)</option></option>
            <option value="">قیمت (زیاد به کم)</option>
          </select>
        </div>
        
      </div>
    </div>
    <br />
    <div class="row products-category">

    @foreach ($productCategory as $product)
      <div class="product-layout product-list col-xs-12">
        <div class="product-thumb">
        <div class="image"><a href="{{ route('products.show', $product->name) }}"><img src="{{ $product->image }}" alt="{{ $product->name }}" title=" {{ $product->name }}" class="img-responsive" style="width: 200px;" /></a></div>
          <div>
            <div class="caption">
              <h4><a href="{{ route('products.show', $product->name) }}">{{$product->name}}</a></h4>
              <p class="description"> 
                {{ $product->body }}
               </p>

              <p class="price"> 
                @if($product->discount != 0)
                    <span class="price-new">{{ number_format($product->dis_price) }} تومان</span>
                    <span class="price-old">{{ number_format($product->price) }} تومان</span>
                    <span class="saving-off">%{{ $product->discount }}</span> 
                @else
                    <span class="price-new">{{ number_format($product->dis_price) }} تومان</span>
                @endif
             </p>

            </div>

            <div class="button-group">
              <div class="add-to-links">
                <button class="add-to-basket"    type="button"   data-id="{{ $product->id }}"><i class="fa fa-shopping-cart"></i>  <span>افزودن به سبد خرید</span></button>
                <button class="add-to-wish-list" type="button"   data-id="{{ $product->id }}" title="افزودن به علاقه مندی ها"><i class="fa fa-heart"></i> <span>افزودن به علاقه مندی ها</span></button>
                <button type="button"  title="مقایسه این محصول" ><i class="fa fa-exchange"></i> <span>مقایسه این محصول</span></button>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      @endforeach
      
    </div>
   
    <!-- Pagination Start !-->
    {{ $productCategory->links() }}
    <!-- Pagination End !-->

  </div>
  <!--Middle Part End -->

@endsection