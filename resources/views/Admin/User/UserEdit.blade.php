@extends('layouts.Admin.dashbord')
@section('title') ویرایش کاربر  @stop 
@section('content')
			<ul class="breadcrumb">
					<li><a href="dashbord"><i class="icon-home"></i>داشبورد</a></li>
					<li><a href="{{ route('user.index') }}">کاربران</a></li>
					<li class="active">ویرایش کاربر</li>
			</ul>
<div class="row">
<div class="col-lg-8 col-lg-offset-2">
<section class="panel">
<header class="panel-heading">
فرم اصلی
</header>
<div class="panel-body">
    <form user="form" action="{{ route('user.update',$user->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PATCH')}}

        <div class="form-group">
            <label for="exampleInputEmail1">نام کاربر</label>
            <input type="text"  name="name" value="{{ $user->name }}" class="form-control" id="exampleInputEmail1" placeholder="عنوان محصول را وارد کنید" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: left center; cursor: auto;">
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
				<label for="exampleInputEmail1">ایمیل کاربر</label>
				<input type="text"  name="email"  value="{{ $user->email }}"  class="form-control" id="exampleInputEmail1" placeholder="برند محصول را وارد کنید" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: left center; cursor: auto;">
            </div> 
            
			@if($errors->has('title'))
				<div class="alert alert-block alert-danger fade in">
				   <button data-dismiss="alert" class="close close-sm" type="button">
					  <i class="icon-remove"></i>
					</button>
					{{ $errors->first('title') }}
			   </div>
			@endif

			<select name="roles_id[]"  mulitple class="form-control" >
				@foreach ($roles as $role)
					<option value="{{ $role->id }}">{{ $role->title}}</option>	
				@endforeach
			</select>

			<br>


        <button type="submit" class="btn btn-warning" name="submit">ویرایش کاربر</button>
    </form>

</div>

</section>
</div></div>
@endsection