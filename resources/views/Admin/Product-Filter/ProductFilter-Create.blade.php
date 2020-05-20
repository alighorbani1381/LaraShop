@extends('layouts.Admin.dashbord')
@section('title')اعمال فیلتر ها@stop 
@push('CustomScript')
<script src="{{ asset('PubAdmin/js/AlertPlugin/sweetalert.js') }}"></script>
<script src="{{ asset('PubAdmin/js/customJs/product-filter.js') }}"></script>
@endpush
@section('content')
			<ul class="breadcrumb">
					<li><a href="dashbord"><i class="icon-home"></i>داشبورد</a></li>
					<li><a href="{{ route('filter.index') }}">  فیلتر ها </a></li>
					<li class="active">اعمال فیلتر</li>
			</ul>
<div class="row">
<div class="col-lg-8 col-lg-offset-2">
<section class="panel">
<header class="panel-heading">
اعمال فیلتر بر روی محصول
<a href="{{ route('products.show', $product->name) }}" target="_blank">  {{$product->name }} </a>

</header>
<div class="panel-body">
	<div class="alert alert-info sd-info" role="alert">
    <span class="icon-bell-alt"></span>
    اگر در این صفحه تمامی ویژگی های محصول را مشاهده نمی کنید به این دلیل است که آن ویژگی قبلا پر شده است، برای تغییر دادن آن ها می توانید از قسمت مشاهده   ویژگی مورد نظر خود را انتخاب و سپس آن ها را ویرایش کنید.
  </div>
  <span style="display:none;" name="type-first-filter" data-value="{{ $filters[0]->type }}"></span>

<form class="form-inline" action="{{ route('product-filter.store', $product->name) }}" method="post" role="form">
  @csrf        
  
  <div class="parent-filter" id="filter_holders">

    <!-- Filter Started !-->
    <input type="hidden" id="number" value="0">
    <input type="hidden" name="product" value="{{ $product->id }}">

    @if($filters->count() != 0)
    <div class="single-filter-append">
      <div class="panel-heading"></div>
      <button class="close close-sm close-single-property" type="button">
        <i class="icon-remove"></i>
      </button>

        <div class="form-group filter-group select-property">
          <span>نام ویژگی</span>
          <select class="form-control filter-custom filter-change" name="filter[0]">
              @foreach($filters as $filter)
                <option value="{{ $filter->id }}" data-type="{{ $filter->type }}"> {{ $filter->persian_name }} </option>
              @endforeach
          </select>
        </div>

    @if($filters[0]->type == 0)
        <div class="form-group filter-group select-value">
            <span>مقدار</span>
            <input type="text"  name="value[0]"  class="form-control filter-custom" id="exampleInputEmail1" placeholder="مقدار این ویژگی را وارد کنید ..." >
          </div>
    @else
        <div class="form-group filter-group select-value" style="margin-left: 7.5%;">
          <span>مقدار</span>
            <div class="filter-custom sp-div-check">
                <div class="pretty p-icon p-curve p-pulse">
                    <input type="radio" name="value[0]" value="0">
                    <div class="state p-info-o" style="display:inline !important;">
                        <label style="margin-left:15px !important"> دارد</label>
                        <i class="icon mdi mdi-check"></i>
                    </div>
                 </div>

                <div class="pretty p-icon p-curve p-pulse">
                  <input type="radio" name="value[0]" value="1">
                  <div class="state p-info-o" style="display:inline !important;">
                      <label style="margin-left:15px !important">ندارد</label>
                      <i class="icon mdi mdi-check"></i>
                  </div>
                </div>

            </div>
        </div>
        @endif
        @else
        <div class="form-group filter-group">
          فیلتری برای نمایش وجود ندارد  
        </div>
   @endif

      </div>


   </div>
    <div class="panel-heading"></div>
  <!-- Filter End !-->

<div class="form-group">
  <div class="add-parent-filter">
    <div class="add-filter-btn" id="filter-add">افزودن ویژگی</div>
    <span class="livicon" data-name="arrow-down" data-size="50" data-color="#0a69ce" data-onparent="true" ></span>
  </div>
</div>
    
      <div class="form-group" style="margin-top: 29px;position: absolute;left: 47%;">
        <button class="btn btn-shadow btn-success" type="submit" id="submit">اعمال ویژگی</button>
      </div>

      <br><br>
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
  .del-hover-filter{
    background: #ffe8e8;
    opacity: 0.6;
  }
</style>

</section>
</div></div>
@endsection