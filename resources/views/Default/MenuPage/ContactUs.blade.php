@extends('layouts.appwide')
@section('title')
تماس با ما
@endsection
@section('content')
<style>
  
 .col-sm-3 strong{
    display: block;
    width: 50%;
    border-bottom: 2px solid #1d84ac;
    padding-bottom:5px;
  }
</style>
 <!--Middle Part Start-->
 <div id="content" class="col-sm-9">
    <h1 class="custom-title-page">تماس با ما</h1>
    <h3 class="subtitle">نشانی ما</h3>
    <div class="row">
      <div class="col-sm-3"><img src="/Default/image/product/store_location-275x180.jpg" alt="قالب مارکت شاپ" title="قالب مارکت شاپ" class="img-thumbnail" /></div>
      <div class="col-sm-3"><strong>فروشگاه ایرانیان</strong><br />
        <address style="text-align: justify;line-height: 2 !important;">
          اصفهان، میدان مرکزی<br />
        خیابان آپادانا<br />
        روبه روی بانک ملت<br />
         </address>
      </div>
      <div class="col-sm-3" style="text-align: justify;line-height: 1.5;"><strong>شماره تلفن</strong><br>
       09162913781<br />
        <br />
        <strong>فکس</strong><br>
        09162913781 </div>
      <div class="col-sm-3"> <strong>ساعات کار</strong><br />
        از ساعت 10 صبح تا 8 شب<br />
        <br />
        <strong>باشگاه مشتریان</strong><br />
     با عضویت در باشگاه مشتریان از مزایای ویژه فروشگاه بهره مند شوید ! </div>
    </div>

  <form class="form-horizontal" action="{{ route('ticket.send') }}" method="post" >
    @csrf
      <fieldset>
        <h3 class="subtitle">سوالاتتون رو از ما بپرسید!</h3>

        @if(!Auth::check())
              <div class="form-group required">
                <label class="col-md-2 col-sm-3 control-label" for="input-name">نام شما</label>
                <div class="col-md-10 col-sm-9">
                <input type="text" name="name" value="{{ old('name') }}" id="input-name" class="form-control" style="border-radius:3px;" placeholder="نام خود را وارد کنید ..." />
                </div>
              </div>
              @error('name')
              <div class="form-group required">
                  <label class="col-md-2 col-sm-3 control-label" for="input-email">          </label>
                  <div class="col-md-10 col-sm-9">
                      <div class="alert alert-danger">
                        {{ $message }}      
                      </div>
                  </div>
              </div>
              @enderror

              <div class="form-group required">
                <label class="col-md-2 col-sm-3 control-label" for="input-email">آدرس ایمیل</label>
                <div class="col-md-10 col-sm-9">
                  <input type="text" name="email" value="{{ old('email') }}" id="input-email" class="form-control" style="border-radius:3px;"  placeholder="ایمیل خود را وارد کنید ..."/>
                </div>
              </div>
              @error('email')
              <div class="form-group required">
                  <label class="col-md-2 col-sm-3 control-label" for="input-email">          </label>
                  <div class="col-md-10 col-sm-9">
                      <div class="alert alert-danger">
                        {{ $message }}      
                      </div>
                  </div>
              </div>
              @enderror
        @endif

        <div class="form-group required">
          <label class="col-md-2 col-sm-3 control-label" for="input-name">عنوان تیکت</label>
          <div class="col-md-10 col-sm-9">
            <input type="text" name="enquiryTitle" value="{{ old('enquiryTitle') }}" id="input-name" class="form-control" style="border-radius:3px;" placeholder="عنوان تیکت را وارد کنید ..." />
          </div>
        </div>
        @error('enquiryTitle')
        <div class="form-group required">
            <label class="col-md-2 col-sm-3 control-label" for="input-email"></label>
            <div class="col-md-10 col-sm-9">
                <div class="alert alert-danger">
                  {{ $message }}      
                </div>
            </div>
        </div>
        @enderror

        <div class="form-group required">
          <label class="col-md-2 col-sm-3 control-label" for="input-enquiry">متن تیکت</label>
          <div class="col-md-10 col-sm-9">
          <textarea name="enquiryText" rows="10" id="input-enquiry" class="form-control" style="border-radius:3px;" placeholder="متن تیکت را وارد کنید ...">{{ old('enquiryTitle') }}</textarea>
          </div>
        </div>
        @error('enquiryText')
        <div class="form-group required">
            <label class="col-md-2 col-sm-3 control-label" for="input-email">          </label>
            <div class="col-md-10 col-sm-9">
                <div class="alert alert-danger">
                  {{ $message }}      
                </div>
            </div>
        </div>
        @enderror

      </fieldset>
      <div class="buttons"  style="position: relative;height: 50px;">
        <div class="pull-right" style="position: absolute;left: 0%; border-radius:5px; ">        
          <input class="btn btn-success" style="border-radius: 2px;font-size: 15px;"type="submit" value="ارسال" />
        </div>
      </div>
    </form>

  </div>
  <aside id="column-right" class="col-sm-3 hidden-xs">
    <div class="list-group" style="text-align:justify;">
      <h2 class="subtitle">توضیح مختصری در مورد ما</h2>
      <p>در فروشگاه ما میتونید بهترین را رو پیدا کنید برای این منظور کافیه از طریق قسمت دسته بندی کالای مد نظرخودتون رو انتخاب کنید و به راحتی اون رو سفارش بدید</p>
    </div>

    @if($sliders->count() != 0)
      <div class="banner owl-carousel">
        @foreach($sliders as $slider)
      <div class="item"> <a href="{{ $slider->link }}"><img src="{{ $slider->picture }}" alt="{{ $slider->title }}" class="img-responsive" /></a> </div>
        @endforeach
      </div>
    @endif

  </aside>
  <!--Middle Part End -->
  @endsection