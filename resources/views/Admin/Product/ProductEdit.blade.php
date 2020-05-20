@extends('layouts.Admin.dashbord')
@section('title') صفحه اصلی @stop 
@section('content')
@section('part')
محصولات
@endsection

<div class="row">
   <div class="col-lg-10 col-lg-offset-1">
      <ul class="breadcrumb">
         <li><a href="dashbord"><i class="icon-home"></i>داشبورد</a></li>
         <li><a href="{{ route('product.index') }}">لیست محصولات</a></li>
         <li class="active">ویرایش</li>
      </ul>
      <section class="panel">
         <header class="panel-heading">
            فرم ویرایش محصول <a href="{{ route('products.show', $product->name) }}" target="_blank">{{ $product->name }}</a>
         </header>
         <div class="panel-body">
            <div class="product-img-part">
               <h4 class="intro-pic">ویرایش جزئیات محصول</h4>
                  <i class="icon-th-list size-mid"></i>
            <form role="form" action="{{ route('product.update',$product->name) }}" method="post" enctype="multipart/form-data">
               {{ csrf_field() }}
               {{ method_field('PATCH') }}
               <div class="form-group">
                  <label for="product-name">نام محصول</label>
                  <input type="text" value="{{ $product->name }}" name="name" class="form-control" id="product-name" placeholder="عنوان محصول را وارد کنید ..." style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: left center; cursor: auto;">
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
                  <label for="product-decription">توضیحات محصول</label>
                  <textarea name="body" class="form-control editor-cv" id="product-decription" placeholder="توضیحات محصول را وارد کنید ...">{{ $product->body }}</textarea>
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
                  <input type="number" value="{{ $product->price }}" name="price" class="form-control" id="product-price" placeholder="قیمت محصول را وارد کنید ...">
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
                  <input type="number" value="{{ $product->discount }}" min="0" max="100" name="discount" class="form-control" id="product-discount" placeholder="درصد تخفیف این محصول را وارد کنید ...">
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
                  <input type="number" value="{{ $product->total }} " name="total" class="form-control" id="product-count" placeholder="تعداد این محصول را وارد کنید ...">
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
                     <input type="radio"  name="status" value="1" id="product-status" @if($product->status==1) checked @endif>
                     <div class="state p-success">
                        <label>موجود</label>    &nbsp; &nbsp; &nbsp; &nbsp;
                        <i class="icon mdi mdi-check"></i>
                     </div>
                  </div>

                  <div class="pretty p-icon p-round p-pulse">
                     <input type="radio"  name="status" value="0" @if($product->status==0) checked @endif>
                     <div class="state p-danger">
                        <label>ناموجود</label>    &nbsp; &nbsp; &nbsp; &nbsp;
                        <i class="icon mdi mdi-check"></i>
                     </div>
                  </div>
               </div>
            </div>

               <div class="panel-heading"></div><br><div class="panel-heading"></div>
               <div class="product-img-part">
                  <h4 class="intro-pic">ویرایش تصویر شاخص محصول</h4>
                  <i class="icon-picture size-mid"></i>
                  @if($product->image != "")
                     <div class="form-group old-tumbnail">
                        <label>تصویر شاخص فعلی</label>
                        <a href="{{ $product->image }}" target="_blank"><img class="tumbnail-product-img" src="{{ $product->image }}" alt="تصویر شاخص"></a>
                     </div>
                  @endif

                  <div class="form-group">
                     <label for="product-picture">
                        @if($product->image != "")
                           تغییر تصویر شاخص
                        @else
                           افزودن تصویر شاخص
                        @endif
                     </label>
                     <input type="file" name="picture" class="form-control" id="product-picture">
                  </div>
             </div>

               
               
               <button type="submit" class="btn btn-warning" name="submit">ویرایش محصول</button>
            </form>
         </div>
      </section>
      <script>
         CKEDITOR.replace( 'product-decription' ); 
      </script>
   </div>
</div>
@endsection

