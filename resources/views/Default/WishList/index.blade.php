@extends('layouts.appwide')

@section('title')
علاقه مندی های من
@endsection

@push('customScript')  
  <script src="{{ asset('Default/js/WishList.js') }}"></script>
@endpush

@section('content')
<!--Middle Part Start-->
<div id="content" class="col-sm-12">
    <h1 class="title custom-title-page">لیست علاقه مندی های من</h1>
    <div class="table-responsive" id="wish-holder">
      @if($wishLists->count() != 0)
      <table class="table table-bordered table-hover" id="wish-table">
        <thead>
          <tr>
            <td class="text-center">تصویر</td>
            <td class="text-left">نام محصول</td>
            <td class="text-left">مدل</td>
            <td class="text-right">موجودی</td>
            <td class="text-right">قیمت واحد</td>
            <td class="text-right">عملیات</td>
          </tr>
        </thead>
        <tbody>
        @foreach($wishLists as $wishList)
            @php $wishProduct=$wishList->product()->first() @endphp
            <tr>
                <td class="text-center"><a href="{{ route('products.show', $wishProduct->name) }}"><img src="{{ $wishProduct->image }}" alt="{{ $wishProduct->name }}" title="{{ $wishProduct->name }}" style="width: 60px;" /></a></td>
            <td class="text-left"><a href="{{ route('products.show', $wishProduct->name) }}">{{ $wishProduct->name }}</a></td>
                <td class="text-left">{{ $wishProduct->brand }}</td>
                <td class="text-right">
                    @if($wishProduct->existed == true)
                        موجود       
                    @else
                        ناموجود
                    @endif
                </td>
                <td class="text-right">
                    <div class="price"> {{ $wishProduct->dis_price }} تومان </div>
                </td>
            <td class="text-right"><button class="btn btn-primary add-to-basket" data-id="{{ $wishProduct->id }}" data-toggle="tooltip" type="button" data-original-title="افزودن به سبد"><i class="fa fa-shopping-cart"></i></button>
                <button class="btn btn-danger remove-wish-product" data-id="{{ $wishList->id }}" title="" data-toggle="tooltip" data-original-title="حذف"><i class="fa fa-times"></i></button>
                </a>
            </td>
            </tr>         
       @endforeach
        </tbody>
      </table>
    @else
      <div class="alert alert-info">
        <i class="fa fa-info-circle"></i> 
        تا کنون محصولی را به لیست علاقه مندی خود اضافه نکرده اید
      </div>
    @endif
    </div>
  </div>
  <!--Middle Part End -->
@endsection

  
  
