@extends('layouts.Admin.dashbord')
@section('title')ویرایش فیلتر محصول@stop 
@push('CustomScript')
<script src="{{ asset('PubAdmin/js/customJs/product-filter.js') }}"></script>
@endpush
@section('content')
			<ul class="breadcrumb">
					<li><a href="dashbord"><i class="icon-home"></i>داشبورد</a></li>
					<li><a href="{{ route('filter.index') }}">  اعمال فیلتر ها </a></li>
					<li class="active">ویرایش فیلتر</li>
			</ul>
<div class="row">
<div class="col-lg-8 col-lg-offset-2">
<section class="panel">
<header class="panel-heading">
ویرایش فیلتر محصول
<a href="{{ route('products.show', $product->name) }}" target="_blank">  {{$product->name }} </a>

</header>
<div class="panel-body">
  <span style="display:none;" name="type-first-filter" data-value="{{ $filter->type }}"></span>

<form class="form-inline" action="{{ route('product-filter.update', $productFilter->id) }}" method="post" id="form">
  @csrf 
  @method('PATCH')       
  
  <div class="parent-filter" id="filter_holders">

    <!-- Filter Started !-->
    <input type="hidden" id="number" value="0">
    <input type="hidden" name="product" value="{{ $product->id }}">

    <div class="single-filter-append">
      <div class="panel-heading"></div>

        <div class="form-group filter-group select-property">
          <span>نام ویژگی</span>
          <input type="hidden"  name="{{ $productFilter->id }}" >
        <input type="text"  value="{{ $filter->persian_name }}" disabled class="form-control filter-custom"  >
        </div>

    @if($filter->type == 0)
        <div class="form-group filter-group select-value">
            <span>مقدار</span>
        <input type="text"  name="value"  class="form-control filter-custom" value="{{ $productFilter->value }}" placeholder="مقدار این ویژگی را وارد کنید ..." >
          </div>
    @else
          <div class="form-group filter-group select-value" style="margin-left: 7.5%;">
            <span>مقدار</span>
              <div class="filter-custom sp-div-check">
                  <div class="pretty p-icon p-curve p-pulse">
                      <input type="radio" name="value" value="0" @if($productFilter->value == '0') {{ "checked" }} @endif>
                      <div class="state p-info-o" style="display:inline !important;">
                          <label style="margin-left:15px !important"> دارد</label>
                          <i class="icon mdi mdi-check"></i>
                      </div>
                  </div>
        
                  <div class="pretty p-icon p-curve p-pulse">
                    <input type="radio" name="value" value="1">
                    <div class="state p-info-o" style="display:inline !important;" @if($productFilter->value == '1') {{ "checked" }} @endif>
                        <label style="margin-left:15px !important">ندارد</label>
                        <i class="icon mdi mdi-check"></i>
                    </div>
                  </div>

              </div>
          </div>
        @endif
     
      </div>


   </div>
    <div class="panel-heading"></div>
  <!-- Filter End !-->

&nbsp;&nbsp;&nbsp;

    
      <div class="wrap">
        <button type="submit" class="button" id="submit">
          ویرایش مشخصات
        </button>
      </div>

</form>
</div>
<style>
  .single-filter-append.select-property{
    width:22%;
    position: absolute !important;
    left: 16%;
  }
  .form-group.filter-group.select-value{
    position: absolute !important;
    left: 14%;
  }
</style>

</section>
</div></div>
@endsection