

@extends('layouts.Admin.dashbord')
@section('title')لیست دسته بندی ها @stop 
@section('content')
<div class="col-lg-12">
   <ul class="breadcrumb">
      <li><a href="dashbord"><i class="icon-dashboard"></i>  داشبورد  </a></li>
      <li><a href="{{ route('category.index') }}">دسته بندی ها</a></li>
      <li class="active">لیست دسته بندی ها</li>
   </ul>
   <section class="panel">
      <header class="panel-heading">
         <span class="main-tubmnail">دسته بندی ها</span>
         <i class="icon-sitemap main-tumbnail-icon"></i>
         <form class="search-custom" style="display:none;">
            <input type="text" class="form-control search search-custom" name="search" placeholder="نام دسته بندی را وارد کنید ..." >
         </form>
      </header>
      <table class="table table-striped table-advance table-hover">
         <thead>
            <tr>
               <th>نام دسته بندی</th>
               <th>سرگروه</th>
               <th>ویرایش</th>
               <th>حذف</th>
            </tr>
         </thead>
         <tbody>
            @if( session()->has('delete') )
            <div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
               <i class="icon-remove"></i>
               </button>
               <strong>خطا: وابستگی های زیر را رفع کنید</strong> 
               <br>
               {{ session()->get('delete') }}
            </div>
            @endif
            @if($categories->count()!=0) 
            @foreach($categories as $category)
            <tr>
               <td>{{ $category->title }} </td>
               <td> {{ $category->main_category_name }} </td>
               <td>
                  <div class="btn-actions-controller">
                     <a  href="{{  route ('category.edit',$category->title ) }}"><button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button></a>
                  </div>
               </td>
               <td>
                  <div class="btn-actions-controller">
                     <form  action="{{ route('category.destroy', $category->title ) }}" method="post" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button>
                     </form>
                  </div>
               </td>
            </tr>
            @endforeach
            @else
            موردی برای نمایش وجود ندارد
            @endif
         </tbody>
      </table>
      {{ $categories->links() }}
   </section>
</div>
<style>
   .sectionf {
   /* background: #dce7eb; */
   width: 100%;
   height: 100%;
   display: flex;
   align-items: center;
   }
   .trash {
   background:#ff6873;
   width: 15px;
   height: 15px;
   display: inline-block;
   margin:0 auto;
   position: relative;
   -webkit-border-bottom-right-radius: 6px;
   -webkit-border-bottom-left-radius: 6px;
   -moz-border-radius-bottomright: 6px;
   -moz-border-radius-bottomleft: 6px;
   border-bottom-right-radius: 6px;
   border-bottom-left-radius: 6px;
   }
   .trash span {
   position: absolute;
   height: 9px;
   background: #ff6873;
   top: -12px;
   left: -5px;
   right: -6px;
   border-top-left-radius: 10px;
   border-top-right-radius: 10px;
   transform: rotate(0deg);
   transition: transform 250ms;
   transform-origin: 19% 100%;
   width: 25px;
   }
   /* Small thing*/
   .trash span:after {
   content: '';
   position: absolute;
   width: 14px;
   height: 8px;
   background: #ff6873;
   top: -11px;
   border-top-left-radius: 10px;
   border-top-right-radius: 10px;
   transform: rotate(0deg);
   transition: transform 250ms;
   transform-origin: 19% 100%;
   left: 6px;
   }
   .trash i {
   position: relative;
   width: 2px;
   height: 8px;
   background: black;
   display: block;
   margin: 4px auto;
   border-radius: 10px;
   }
   .trash i:after {
   content: '';
   width: 3px;
   height: 10px;
   background:black;
   position: absolute;
   left: -10px;
   border-radius: 5px;
   }
   .trash i:before {
   content: '';
   width: 3px;
   height: 10px;
   background:black;
   position: absolute;
   right: -10px;
   border-radius: 5px;
   }
   .trash:hover span {
   transform: rotate(-45deg);
   transition: transform 250ms;
   }			
</style>
@endsection

