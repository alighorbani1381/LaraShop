@extends('layouts.Admin.dashbord')
@section('title') افزودن کاربر جدید @stop
@push('CustomScript')
<script src="{{ asset('PubAdmin/js/AlertPlugin/sweetalert.js') }}"></script>
@endpush
@section('content')
<ul class="breadcrumb">
   <li><a href="dashbord"><i class="icon-home"></i>داشبورد</a></li>
   <li><a href="{{ route('product.index') }}">لیست کاربران</a></li>
   <li class="active">افزودن</li>
</ul>
<div class="row">
   <div class="col-lg-8 col-lg-offset-2">
      <section class="panel">
         <header class="panel-heading">
            افزودن کاربر جدید
         </header>
         <div class="panel-body">
            <form role="form" action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
               @csrf

               <div class="form-group">
                  <label for="user-name">نام کاربر</label>
                  <input type="text"  name="userName" value="{{ old('userName') }}" class="form-control" id="user-name" placeholder="نام کاربر را وارد کنید ..." style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: left center; cursor: auto;">
               </div>

            @if($errors->has('userName'))
				<div class="alert alert-block alert-danger fade in">
					<button data-dismiss="alert" class="close close-sm" type="button">
					<i class="icon-remove"></i>
					</button>
					وارد کردن نام کاربر الزامی است.
				</div>
			   @endif
            
            <div class="form-group">
               <label for="user-email">ایمیل کاربر</label>
               <input type="email" name="userEmail" value="{{ old('userEmail') }}"   class="form-control" id="user-email" placeholder="ایمیل کاربر را وارد کنید ...">
            </div>
         
            @if($errors->has('userEmail'))
               <div class="alert alert-block alert-danger fade in">
                  <button data-dismiss="alert" class="close close-sm" type="button">
                  <i class="icon-remove"></i>
                  </button>
                  {{ $errors->get('userEmail') }}
               </div>
            @endif
         
         <div class="form-group">
            <label for="password">رمز عبور کاربر</label>
            <input type="password" name="userPassword" class="form-control" id="password" placeholder="رمز عبور کاربر را وارد کنید ...">
         </div>

         @if($errors->has('userPassword'))
         <div class="alert alert-block alert-danger fade in">
            <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="icon-remove"></i>
            </button>
            رمز عبور را وارد کنید
         </div>
      @endif

         <div class="form-group">
            <label for="pass-confrim">تکرار رمز</label>
            <input type="password" name="userPasswordConfrim"  class="form-control" id="pass-confrim" placeholder="رمز عبور را مجددا در اینجا بنویسید ...">
         </div>
            

         @if($errors->has('userPasswordConfrim'))
         <div class="alert alert-block alert-danger fade in">
            <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="icon-remove"></i>
            </button>
            تکرار رمز عبور را وارد کنید .
         </div>
      @endif
			   
            <div class="form-group">
               <label for="role"> نقش کاربر </label>
               <select class="form-control m-bot15" name="userRole" id="role">
                  <option value="admin">مدیر</option>
                  <option value="user">عادی</option>
               </select>
            </div>

			   
            @if($errors->has('userRole'))
               <div class="alert alert-block alert-danger fade in">
                  <button data-dismiss="alert" class="close close-sm" type="button">
                  <i class="icon-remove"></i>
                  </button>
                  برای کاربر باید حتما نقشی را در نظر بگیرید.
               </div>
			   @endif
			   
            <div class="form-group">
               <label for="user-picture">تصویر کاربر</label>
               <input type="file" name="userPicture" class="form-control" id="user-picture" >
			   </div>
			   
            @if($errors->has('userPicture'))
               <div class="alert alert-block alert-danger fade in">
                  <button data-dismiss="alert" class="close close-sm" type="button">
                  <i class="icon-remove"></i>
                  </button>
                  {{ $errors->first('userPicture') }}
               </div>
			   @endif
			   
               <div class="form-group">
                  <label for="exampleInputEmail1">آیا ایمیل کاربر اعتبار سنجی شود؟</label>
                  <div class="pretty p-icon p-round p-pulse">
                     <input type="radio"  name="checkEmail" value="1" checked />
                     <div class="state p-success">
                        <label>بله</label>    &nbsp; &nbsp; &nbsp; &nbsp;
                        <i class="icon mdi mdi-check"></i>
                     </div>
                  </div>

                  <div class="pretty p-icon p-round p-pulse">
                     <input type="radio"  name="checkEmail" value="0" />
                     <div class="state p-danger">
                        <label>خیر</label>    &nbsp; &nbsp; &nbsp; &nbsp;
                        <i class="icon mdi mdi-check"></i>
                     </div>
                  </div>
			   </div>
			   
               <button type="submit" class="btn btn-success" name="submit">افزودن  کاربر</button>
            </form>
         </div>
      </section>
   </div>
</div>

   @if(session()->has('passwordReapit'))
      <script>
         $(document).ready(function(){
            Swal.fire({
               icon: 'warning',
               title: 'تکرار رمز عبور',
               text: 'رمز عبور و تکرار آن مثل هم نیستند دوباره اطلاعات رو وارد کن',
               confirmButtonText: 'باشه ممنون',
            });
         });
      </script>
   @endif

@endsection



