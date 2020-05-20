@extends('layouts.Admin.dashbord')
@section('title') صفحه اصلی @stop
@push('CustomScript')
<script src="{{ asset('PubAdmin/js/ckeditor/ckeditor.js') }}"></script>
@endpush
@section('content')
@section('part')
محصولات
@endsection

<div class="row">
   <div class="col-lg-10 col-lg-offset-1">
      <ul class="breadcrumb">
         <li><a href="dashbord"><i class="icon-home"></i>داشبورد</a></li>
         <li><a href="{{ route('product.index') }}">لیست محصولات</a></li>
         <li class="active">افزودن</li>
      </ul>
      <section class="panel">
         <header class="panel-heading">
            افزودن محصول جدید به فروشگاه شما
         </header>
         <link rel="stylesheet" href="/PubAdmin/css/notification.css" >
         <div class="panel-body">
            <div class="product-img-part">
               <h4 class="intro-pic">افزودن جزئیات محصول</h4>
                  <i class="icon-th-list size-mid"></i>
            <form role="form" action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="form-group">
                  <label for="exampleInputEmail1">نام محصول</label>
                  <input type="text"  name="name" value="{{ old('name') }}" class="form-control" id="exampleInputEmail1" placeholder="عنوان محصول را وارد کنید ..." style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: left center; cursor: auto;">
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
                  <label for="product-category">دسته بندی محصول</label>
                  <select class="form-control m-bot15" name="category_id" id="product-category">
                     @foreach($categories as $category)
                     <option value="{{ $category->id }}"> {{ $category->title }} </option>
                     @endforeach
                  </select>
               </div>
               <div class="form-group">
                  <label for="product-brand">برند</label>
                  <input type="text"  name="brand"  value="{{ old('brand') }}"  class="form-control" id="product-brand" placeholder="برند محصول را وارد کنید ..." style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: left center; cursor: auto;">
			   </div>
			   
               @if($errors->has('brand'))
				<div class="alert alert-block alert-danger fade in">
					<button data-dismiss="alert" class="close close-sm" type="button">
					<i class="icon-remove"></i>
					</button>
					{{ $errors->first('brand') }}
				</div>
			   @endif
			   
               <div class="form-group">
                  <label for="editor1">توضیحات محصول</label>
                  <textarea name="body" value="{{ old('body') }}"   class="form-control editor-cv" id="editor1" placeholder="توضیحات محصول را وارد کنید ..."></textarea>
			   </div>
			   
               @if($errors->has('body'))
					<div class="alert alert-block alert-danger fade in">
						<button data-dismiss="alert" class="close close-sm" type="button">
						<i class="icon-remove"></i>
						</button>
						{{ $errors->first('body') }}
					</div>
			   @endif
			   
               <div class="form-group">
                  <label for="product-price">قیمت محصول (تومان)</label>
                  <input type="number" name="price" value="{{ old('price') }}"  class="form-control" id="product-price" placeholder="قیمت محصول را وارد کنید ...">
			    </div>
			   
               @if($errors->has('price'))
					<div class="alert alert-block alert-danger fade in">
						<button data-dismiss="alert" class="close close-sm" type="button">
						<i class="icon-remove"></i>
						</button>
						{{ $errors->first('price') }}
					</div>
			   @endif
			   
               <div class="form-group">
                  <label for="product-discount">درصد تخفیف</label>
                  <input type="number" name="discount" value="{{ old('discount') }}" min="0" max="100" class="form-control" id="product-discount" placeholder="ذرصد تخفیف را وارد کنید ...">
			   </div>
			   
               @if($errors->has('discount'))
					<div class="alert alert-block alert-danger fade in">
						<button data-dismiss="alert" class="close close-sm" type="button">
						<i class="icon-remove"></i>
						</button>
						{{ $errors->first('discount') }}
					</div>
			   @endif
			   
               <div class="form-group">
                  <label for="product-count">تعداد</label>
                  <input type="number" name="total" value="{{ old('total') }}"  class="form-control" id="product-count" placeholder="تعداد این محصول را وارد کنید ...">
			   </div>
			   
               @if($errors->has('total'))
               <div class="alert alert-block alert-danger fade in">
                  <button data-dismiss="alert" class="close close-sm" type="button">
                  <i class="icon-remove"></i>
                  </button>
                  {{ $errors->first('total') }}
               </div>
			   @endif
			   
           
               <div class="form-group">
                  <label for="product-status">وضعیت فروش محصول</label>
                  <div class="pretty p-icon p-round p-pulse">
                     <input type="radio"  name="status" value="1" id="product-status"/>
                     <div class="state p-success">
                        <label>موجود</label>    &nbsp; &nbsp; &nbsp; &nbsp;
                        <i class="icon mdi mdi-check"></i>
                     </div>
                  </div>

                  <div class="pretty p-icon p-round p-pulse">
                     <input type="radio"  name="status" value="0" />
                     <div class="state p-danger">
                        <label>ناموجود</label>    &nbsp; &nbsp; &nbsp; &nbsp;
                        <i class="icon mdi mdi-check"></i>
                     </div>
                  </div>
			   </div>
			   
    

      <div class="panel-heading"></div><br>
         <h4 class="intro-pic">افزودن تصویر شاخص محصول</h4>
            <i class="icon-picture size-mid"></i>
            <div class="form-group">
               <label for="product-tumbimg">تصویر شاخص محصول</label>
               <input type="file" name="picture" class="form-control" id="product-tumbimg">
             </div>
         
            @if($errors->has('picture'))
            <div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
               <i class="icon-remove"></i>
               </button>
               {{ $errors->first('picture') }}
            </div>
         @endif
          <button type="submit" class="btn btn-success" name="submit">افزودن محصول</button>
       </form>
         </div>

         <script>
            CKEDITOR.replace( 'editor1' ); 
         </script>
      </section>
   </div>
</div>
@endsection

