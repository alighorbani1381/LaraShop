

@extends('layouts.Admin.dashbord')
@section('title') صفحه اصلی @stop
@section('content')
@section('part')
محصولات
@endsection
<ul class="breadcrumb">
   <li><a href="dashbord"><i class="icon-home"></i>داشبورد</a></li>
   <li><a href="{{ route('product.index') }}"> محصولات</a></li>
   <li class="active">گالری تصاویر</li>
</ul>
<div class="row">
   <div class="col-lg-8 col-lg-offset-2">
      <section class="panel">
         <header class="panel-heading">
            افزودن تصویر به   
            {{ $product->name }}
         </header>
         @push('script')
         <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
         <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
         @endpush
         <link rel="stylesheet" href="/PubAdmin/css/notification.css" >
         <div class="panel-body">
            <div class="form-group">
               <label for="exampleInputEmail1">تصویر مورد نظر</label>
               <form action="{{ route('product.gallery.upload', ['id' => $product->id,] ) }}" class="dropzone" method="POST">
                  @csrf
                  <div class="fallback">
                     <input name="file" type="file" multiple />
                  </div>
               </form>
            </div>
         </div>
      </section>
   </div>
</div>
@endsection

