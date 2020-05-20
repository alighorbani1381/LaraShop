@extends('layouts.Admin.dashbord')
@section('title') افزودن دسترسی جدید @stop 
@section('content')
			<ul class="breadcrumb">
					<li><a href="dashbord"><i class="icon-home"></i>داشبورد</a></li>
					<li><a href="{{ route('permission.index') }}">دسترسی ها</a></li>
					<li class="active">افزودن دسترسی</li>
			</ul>
<div class="row">
<div class="col-lg-8 col-lg-offset-2">
<section class="panel">
<header class="panel-heading">
فرم افزودن دسترسی
</header>
<div class="panel-body">
    <form role="form" action="{{ route('permission.store') }}" method="post">
		{{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputEmail1">نام دسترسی</label>
            <input type="text"  name="name" value="{{ old('name') }}" class="form-control" id="exampleInputEmail1" placeholder="عنوان محصول را وارد کنید" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: left center; cursor: auto;">
        </div> 
		@if($errors->has('name'))
			<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                  <i class="icon-remove"></i>
                </button>
				{{ $errors->first('name') }}
           </div>
		@endif
		
		    <div class="form-group">
				<label for="exampleInputEmail1">عنوان دسترسی</label>
				<input type="text"  name="title"  value="{{ old('title') }}"  class="form-control" id="exampleInputEmail1" placeholder="برند محصول را وارد کنید" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: left center; cursor: auto;">
			</div> 
			@if($errors->has('title'))
				<div class="alert alert-block alert-danger fade in">
				   <button data-dismiss="alert" class="close close-sm" type="button">
					  <i class="icon-remove"></i>
					</button>
					{{ $errors->first('title') }}
			   </div>
			@endif
	


        <button type="submit" class="btn btn-success" name="submit">افزودن سطح دسترسی</button>
    </form>

</div>

</section>
</div></div>
@endsection