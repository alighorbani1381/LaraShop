@extends('layouts.Admin.dashbord')
@section('title') افزودن فیلتر جدید@stop 
@push('CustomScript')
<script src="{{ asset('PubAdmin/js/AlertPlugin/sweetalert.js') }}"></script>
<script src="{{ asset('PubAdmin/js/customJs/filter.js') }}"></script>
@endpush
@section('content')
			<ul class="breadcrumb">
					<li><a href="dashbord"><i class="icon-home"></i>داشبورد</a></li>
					<li><a href="{{ route('filter.index') }}">  فیلتر ها </a></li>
					<li class="active">افزودن</li>
			</ul>
<div class="row">
<div class="col-lg-8 col-lg-offset-2">
<section class="panel">
<header class="panel-heading" style="position:relative;">
افزودن فیلتر جدید


</header>
<div class="panel-body">
	
<form class="form-inline" action="{{ route('filter.store') }}" method="post" id="form">
  @csrf        
  <div class="select-holder">
    @if($categories->count() != 0)
      <div class="form-group" style="width:100%;">
        <label for="subset">دسته بندی مورد نظر</label>
        <select class="form-control m-bot15" name="category_id" id="category_id">
          @foreach($categories as $key => $category)
              @if($key == 0)
                <?php $targetCategory=$category->id; ?>
                <option value="{{ $category->id }}" selected=""> {{ $category->title }} </option>
              @else
              <option value="{{ $category->id }}"> {{ $category->title }} </option>
              @endif
          @endforeach
        </select>
      </div><br>
      @else
      <div class="alert alert-danger" role="alert">
        دسته بندی برای نمایش وجود ندارد
      </div>
      @endif
<div id="result"></div>

    <div class="loading">
      {{-- <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="width: 48px;position: absolute;height: 48px;margin: 0px auto;left: -4px;  top: -6px;margin: auto; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; display: block; shape-rendering: auto;" width="121px" height="121px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
        <g transform="translate(50 50)">
          <g transform="scale(0.8)">
            <g transform="translate(-50 -50)">
              <g>
                <animateTransform attributeName="transform" type="translate" repeatCount="indefinite" dur="1s" values="-20 -20;20 -20;0 20;-20 -20" keyTimes="0;0.33;0.66;1"></animateTransform>
                <path fill="#46dff0" d="M44.19 26.158c-4.817 0-9.345 1.876-12.751 5.282c-3.406 3.406-5.282 7.934-5.282 12.751 c0 4.817 1.876 9.345 5.282 12.751c3.406 3.406 7.934 5.282 12.751 5.282s9.345-1.876 12.751-5.282 c3.406-3.406 5.282-7.934 5.282-12.751c0-4.817-1.876-9.345-5.282-12.751C53.536 28.033 49.007 26.158 44.19 26.158z"></path>
                <path fill="#e90c59" d="M78.712 72.492L67.593 61.373l-3.475-3.475c1.621-2.352 2.779-4.926 3.475-7.596c1.044-4.008 1.044-8.23 0-12.238 c-1.048-4.022-3.146-7.827-6.297-10.979C56.572 22.362 50.381 20 44.19 20C38 20 31.809 22.362 27.085 27.085 c-9.447 9.447-9.447 24.763 0 34.21C31.809 66.019 38 68.381 44.19 68.381c4.798 0 9.593-1.425 13.708-4.262l9.695 9.695 l4.899 4.899C73.351 79.571 74.476 80 75.602 80s2.251-0.429 3.11-1.288C80.429 76.994 80.429 74.209 78.712 72.492z M56.942 56.942 c-3.406 3.406-7.934 5.282-12.751 5.282s-9.345-1.876-12.751-5.282c-3.406-3.406-5.282-7.934-5.282-12.751 c0-4.817 1.876-9.345 5.282-12.751c3.406-3.406 7.934-5.282 12.751-5.282c4.817 0 9.345 1.876 12.751 5.282 c3.406 3.406 5.282 7.934 5.282 12.751C62.223 49.007 60.347 53.536 56.942 56.942z"></path>
              </g>
            </g>
          </g>
        </g>
      </svg> --}}


      <svg style="width: 48px;position: absolute;height: 48px;margin: 0px auto;left: -4px;  top: -6px;margin: auto; background: none; display: block; shape-rendering: auto;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
      <circle cx="50" cy="50" r="32" stroke-width="8" stroke="#2c73dd" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round" transform="rotate(325.951 50 50)">
        <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="0.3s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform>
      </circle>
      </svg>
    </div>

    
      <div id="filter-group" class="form-group" style="width:100%;">
        <label for="subset">گروه بندی فیلتر</label>
        <select class="form-control m-bot15" name="parent_id" id="parent_id">
          <option value="-1">لطفا یک دسته بندی را انتخاب کنید</option>
          <option value="0" selected="">سرگروه</option>
          @foreach ($subFilters as $subFilter)
            <option value="{{ $subFilter->id }}"> {{ $subFilter->persian_name }} </option>
          @endforeach
        </select>
      </div><br>

    </div>

  <div class="parent-filter" id="filter_holders">
    <!-- Filter Started !-->
    <input type="hidden" id="number" value="0">
    <div class="panel-heading"></div>
        <div class="single-filter-part">
              <button class="close close-sm close-single-filter" type="button">
                <i class="icon-remove"></i>
              </button>
                  <div class="form-group">
                  <span>نام فارسی</span>
                  <input type="text"  name="persian_name[0]"  class="form-control filter-custom"  placeholder="نام فارسی فیلتر را وارد کنید ...">
                  </div>

                  <div class="form-group english-name" style="margin-right:25%;">
                    
                    <span>نام انگلیسی</span>
                    <input type="text"  name="english_name[0]"  class="form-control filter-custom"  placeholder="نام انگلیسی فیلتر را وارد کنید ...">
                  </div>
                  
                  {{-- <div class="form-group filter-type">
                    <span>نوع فیلتر</span>
                      <div class="filter-custom sp-div-check">
                          <div class="pretty p-icon p-curve p-pulse">
                              <input type="radio" name="type[0]" value="0">
                              <div class="state p-info-o" style="display:inline !important;">
                                  <label style="margin-left:15px !important"> توضیحی</label>
                                  <i class="icon mdi mdi-check"></i>
                              </div>
                          </div>

                          <div class="pretty p-icon p-curve p-pulse">
                            <input type="radio" name="type[0]" value="1">
                            <div class="state p-info-o" style="display:inline !important;">
                                <label style="margin-left:15px !important"> انتخاب گر</label>
                                <i class="icon mdi mdi-check"></i>
                            </div>
                        </div>

                      </div>
                  </div> --}}

                  <div class="panel-heading"></div>
                </div>
          <!-- Filter End !-->
    </div>

<div class="clear-fix"></div>
<div class="form-group" style="margin-top: 20px;">
  <div class="add-parent-filter">
    <div class="add-filter-btn" id="add-filter">افزودن فیلتر</div>
    <span class="livicon" data-name="hand-right" data-size="45" data-color="#0a69ce" data-onparent="true" ></span>
  </div>
</div>

<div class="form-group" style="margin-top: 29px;position: absolute;left: 47%;">


  <button class="btn btn-shadow btn-success" type="button" id="submit">ثبت فیلتر</button>
</div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    
        
          
        
    
</form>
</div>

</section>
</div></div>
<style>

  .delete-hover{
    opacity: 0.5;
    border-radius: 3px;
    background: #f9e9e9;
    transition: 0.5s;
  }
  
  
  .close-single-filter i{
  font-size:30px;
  color:red;
  }

  .english-name{
    transition: 0.5s;
  }
  .livicon {
      display: inline-block;
      line-height: inherit;
      vertical-align: middle;
      height: 18px!important;
    }
  #filter-type{
    transition: 0.5s;
  }
  .alert-fill{
  border: 1px solid #df0000;
  box-shadow: 0 0px 5px #e12424;
  }
  #canvas-for-livicon-8 {
	margin-right: 5px;
	transition: 1s;
    }
    .single-filter-part span{
    transition: 0.5s;
  }

</style>


@endsection