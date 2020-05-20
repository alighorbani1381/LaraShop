
@extends('layouts.Admin.dashbord')
@section('title') افزودن دسته بندی جدید@stop 
@section('content')
<ul class="breadcrumb">
   <li><a href="dashbord"><i class="icon-dashboard"></i>  داشبورد  </a></li>
   <li><a href="{{ route('category.index') }}">دسته بندی ها</a></li>
   <li class="active">افزودن</li>
</ul>
<div class="row">
   <div class="col-lg-8 col-lg-offset-2">
      <section class="panel">
         <header class="panel-heading">
            <span class="main-tumbnail">افزودن دسته بندی جدید</span>
            {{-- <i class="icon-plus-sign-alt main-tumbnail-icon" style="vertical-align:-7px;"></i> --}}
            <span class="mdi mdi-source-repository-multiple"></span>
         </header>
         <div class="panel-body">
            <form role="form" action="{{ route('category.store') }}" method="post" id="add_role_frm">
               {{ csrf_field() }}
               <div class="form-group">
                  <label for="category-name">عنوان دسته بندی</label>
                  <input type="text"  name="title" value="{{ old('title') }}" class="form-control" id="category-name" placeholder="عنوان دسته بندی را وارد کنید ..." style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: left center; cursor: auto;">
               </div>
               @if($errors->has('title'))
               <div class="alert alert-block alert-danger fade in">
                  <button data-dismiss="alert" class="close close-sm" type="button">
                  <i class="icon-remove"></i>
                  </button>
                  {{ $errors->first('title') }}
               </div>
               @endif
               {{-- @if(count($subsets)!=0) --}}
               <div class="form-group">
                  <label for="subset">سرگروه</label>
                  <select class="form-control m-bot15" name="subset" id="subset">
                     <option value="0" selected >سرگروه</option>
                     @foreach($subsets as $subset)
                     <option value="{{ $subset->id }}"> {{ $subset->title }} </option>
                     @endforeach
                  </select>
               </div>
               {{-- @endif --}}
               <button type="submit" class="btn btn-success" name="submit">
                  <div class="button-tick">
                     <div class="container">
                        <div class="tick">
                           ذخیره
                        </div>
                     </div>
                  </div>
               </button>
            </form>
         </div>
      </section>
   </div>
</div>
<script>
   /*
   //$('.tick');
   var tickMark = "<svg width=\"15\" height=\"32\" viewBox=\"0 0 58 45\" xmlns=\"http://www.w3.org/2000/svg\"><path fill=\"#fff\" fill-rule=\"nonzero\" d=\"M19.11 44.64L.27 25.81l5.66-5.66 13.18 13.18L52.07.38l5.65 5.65\"/></svg>";
   var faild='<?xml version="1.0" encoding="iso-8859-1"?><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 455.111 455.111" style="enable-background:new 0 0 455.111 455.111;" xml:space="preserve"><circle style="fill:#E24C4B;" cx="227.556" cy="227.556" r="227.556"/><path style="fill:#D1403F;" d="M455.111,227.556c0,125.156-102.4,227.556-227.556,227.556c-72.533,0-136.533-32.711-177.778-85.333c38.4,31.289,88.178,49.778,142.222,49.778c125.156,0,227.556-102.4,227.556-227.556c0-54.044-18.489-103.822-49.778-142.222C422.4,91.022,455.111,155.022,455.111,227.556z"/><path style="fill:#FFFFFF;" d="M331.378,331.378c-8.533,8.533-22.756,8.533-31.289,0l-72.533-72.533l-72.533,72.533c-8.533,8.533-22.756,8.533-31.289,0c-8.533-8.533-8.533-22.756,0-31.289l72.533-72.533l-72.533-72.533c-8.533-8.533-8.533-22.756,0-31.289c8.533-8.533,22.756-8.533,31.289,0l72.533,72.533l72.533-72.533c8.533-8.533,22.756-8.533,31.289,0c8.533,8.533,8.533,22.756,0,31.289l-72.533,72.533l72.533,72.533C339.911,308.622,339.911,322.844,331.378,331.378z"/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>';
   $('.button-tick').click(function(){
   //$(this).html(tickMark);
   $(this).addClass('button-tick__circle');
   if($("#category-name").val() == ""){
   
     $(this).html(faild);
     $(this).parent().removeClass('btn-success');
     $(this).addClass('button-tick-faild');
     $(this).parent().addClass('btn-danger');
     $(this).parent().after('<div class="alert-after-submit">ابتدا باید تمامی مقادیر را  پر کنید!</div>');
     setTimeout(function(btn){
       $(this).removeClass('button-tick__circle');
       $('.button-tick').html('ذخیره');
       $('.button-tick').parent().addClass('btn-success');
       $('.button-tick').children().removeClass('button-tick-faild');
       $('.button-tick').parent().removeClass('btn-danger');
     },500);
     
   }
   
   
   });
   */
</script>
<style>
   .alert-after-submit{
   margin-right: 10px !important; 
   display: inline !important;
   }
   .button-tick-faild{
   background-color: #d90000;
   border-color: #d90000;
   }
   #subset{
   font-size: small;
   }
   .button-tick, .tick {
   display: flex;
   justify-content: center;
   align-items: center;
   font-family: IRANSANSWEB !important;
   }
   .button-tick {
   width: max-content;
   height: max-content;
   border-radius: 6px;
   transition: all 0.3s cubic-bezier(0.67, 0.17, 0.40, 0.83);
   }
   .button-tick svg{
   transform: rotate(180deg);
   transition: all 0.3s;
   }
   .button-tick-faild svg {
   transform: rotate(180deg);
   transition: all 0.3s;
   }
   .button-tick__circle {
   width: 25px;
   height: 25px;
   background: #78CD51;
   border-radius: 50%;
   transform: rotate(-180deg);
   }
   .button-tick:hover {
   cursor: pointer;
   }
   .tick {
   color: white;
   font-size: 15px;
   transition: all 0.3s;
   }
</style>
@endsection

