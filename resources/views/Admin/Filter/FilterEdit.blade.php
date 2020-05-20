@extends('layouts.Admin.dashbord')
@section('title')    ویرایش فیلتر   @stop 
@section('content')
			<ul class="breadcrumb">
					<li><a href="dashbord"><i class="icon-home"></i>داشبورد</a></li>
					<li><a href="{{ route('filter.index') }}">  فیلتر ها </a></li>
					<li class="active">ویرایش</li>
			</ul>
<div class="row">
<div class="col-lg-8 col-lg-offset-2">
<section class="panel">
<header class="panel-heading">
ویرایش فیلتر
({{ $filter->persian_name }})
</header>
<div class="panel-body">
<form class="form-inline" action="{{ route('filter.update', $filter->id) }}" method="post" role="form">
  @csrf        
  @method('PATCH')
    @if($categories->count() != 0)    
      <div class="form-group" style="width:100%;">
        <label for="subset">دسته بندی مورد نظر</label>
        <select class="form-control m-bot15" name="category_id">
          @foreach($categories as $category)
            <option value="{{ $category->id }}"  @if($category->id == $filter->category_id) selected @endif > {{ $category->title }} </option>
          @endforeach
        </select>
      </div><br>
      @else
      <div class="alert alert-danger" role="alert">
        دسته بندی برای نمایش وجود ندارد
      </div>
      @endif

    
      <div class="form-group" style="width:100%;">
        <label for="subset">گروه بندی فیلتر</label>
        <select class="form-control m-bot15" name="parent_id">
          <option value="0" selected >سرگروه</option>
          @foreach($otherFilters as $otherFilter)
            <option value="{{ $otherFilter->id }}" @if($otherFilter->id == $filter->parent_id) selected @endif> {{ $otherFilter->persian_name }} </option>
          @endforeach
        </select>
      </div><br>
     

  

  <div class="parent-filter" id="filter_holders">

    <!-- Filter Started !-->
    <input type="hidden" id="number" value="0">
    <div class="panel-heading"></div>
        <div class="form-group">
        <span>نام فارسی</span>
        <input type="text"  value="{{ $filter->persian_name }}" name="persian_name"  class="form-control filter-custom" id="exampleInputEmail1" placeholder="نام فارسی فیلتر را وارد کنید ...">
        </div>

        <div class="form-group">
          <span>نام انگلیسی</span>
          <input type="text" value="{{ $filter->english_name }}" name="english_name"  class="form-control filter-custom" id="exampleInputEmail1" placeholder="نام انگلیسی فیلتر را وارد کنید ...">
        </div>
        
        @php 
        $type_one="";
        $type_two="";
        if($filter->type==0) 
          $type_one="checked";
        else 
          $type_two="checked";
        @endphp

        <div class="form-group">
          <span>نوع فیلتر</span>
            <div class="filter-custom sp-div-check">
                <div class="pretty p-icon p-curve p-pulse">
                    <input type="radio" name="type" value="0" {{ $type_one }}>
                    <div class="state p-info-o" style="display:inline !important;">
                        <label style="margin-left:15px !important">توضیحی</label>
                        <i class="icon mdi mdi-check"></i>
                    </div>
                </div>

                <div class="pretty p-icon p-curve p-pulse">
                  <input type="radio" name="type" value="1" {{ $type_two }}>
                  <div class="state p-info-o" style="display:inline !important;">
                      <label style="margin-left:15px !important">انتخابگر</label>
                      <i class="icon mdi mdi-check"></i>
                  </div>
              </div>

            </div>
        </div>

    <div class="panel-heading"></div>
  <!-- Filter End !-->



    <div class="form-group" style="margin-top: 29px;position: absolute;left: 47%;">
        <button class="btn btn-shadow btn-success" type="submit">
        ویرایش فیلتر
        </button>
    </div>
    <br><br><br><br>
  </div>
</form>
</div>

</section>
</div>

</div>

<script src="{{ asset('PubAdmin/js/liveicon/jquery-1.9.1.min.js') }}"></script>
<script src="{{ asset('PubAdmin/js/liveicon/raphael-min.js') }}"></script>
<script src="{{ asset('PubAdmin/js/liveicon/livicons-1.2.min.js') }}"></script>
<script src="{{ asset('PubAdmin/js/liveicon/liveicon.js') }}"></script>


@endsection