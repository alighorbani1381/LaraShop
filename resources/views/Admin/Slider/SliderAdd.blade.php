@extends('layouts.Admin.dashbord')
@section('title') افزودن اسلایدر جدید @stop 
@section('content')
<div class="row">
<div class="col-lg-8 col-lg-offset-2">
  <ul class="breadcrumb">
    <li><a href="dashbord"><i class="icon-home"></i>داشبورد</a></li>
    <li><a href="{{ route('slider.index') }}"> اسلایدر   </a></li>
    <li class="active">افزودن</li>
</ul>
<section class="panel">
<header class="panel-heading">
افزودن اسلایدر
</header>
<div class="panel-body">
    <form role="form" action="{{ route('slider.store') }}" method="post" id="add_role_frm" enctype="multipart/form-data">
      @csrf
      
        <div class="form-group">
            <label for="slider-title">عنوان اسلایدر</label>
            <input type="text"  name="title" value="{{ old('title') }}" class="form-control" id="slider-title" placeholder="عنوان اسلایدر را وارد کنید ..." style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: left center; cursor: auto;">
	    	</div> 
		
        @error('title')
        <div class="alert alert-block alert-danger fade in">
          <button data-dismiss="alert" class="close close-sm" type="button">
              <i class="icon-remove"></i>
          </button>
          {{ $message }}
        </div>
      @enderror
    
    <div class="form-group">
      <label for="slider-link">لینک</label>
      <input type="text"  name="link" value="{{ old('link') }}" class="form-control" id="slider-link" placeholder="لینک اسلایدر را وارد کنید ..." style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: left center; cursor: auto;">
    </div> 

    @error('link')
      <div class="alert alert-block alert-danger fade in">
        <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="icon-remove"></i>
        </button>
        {{ $message }}
      </div>
    @enderror


    <div class="form-group">
      <label for="slider-pictre">تصویر</label>
      <input type="file"  name="picture" class="form-control" id="slider-pictre" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: left center; cursor: auto;">
    </div> 
    
    @error('picture')
    <div class="alert alert-block alert-danger fade in">
      <button data-dismiss="alert" class="close close-sm" type="button">
          <i class="icon-remove"></i>
      </button>
      {{ $message }}
    </div>
  @enderror

  <div class="form-group">
    <label for="slider-position">جایگاه اسلایدر</label>
		<select class="form-control m-bot15" name="position" id="slider-position">
				<option value="top">بالای سایت (صفحه اصلی)</option>
				<option value="middle">بنر های وسط سایت</option>
				<option value="right">ستون سمت راست</option>
		</select>
  </div>
  
	<button type="" class="btn btn-success" name="submit">
		<div class="button-animate-send">
			<div class="container">
				<div class="tick">
				</div>
			</div>
		</div>
</button>

</form>
</div>

</section>
</div></div>
<script>$(document).ready(function(){setAmimateSubmit('افزودن')});;</script>
@endsection