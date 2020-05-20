@extends('layouts.Admin.dashbord')
@section('title') صفحه اصلی @stop 
@section('content')
<style>.pic{width:80px;}</style>
<div class="col-lg-12">
   <ul class="breadcrumb">
      <li><a href="dashbord"><i class="icon-dashboard"></i>  داشبورد  </a></li>
      <li><a href="{{ route('product.index') }}"> محصولات</a></li>
      <li class="active">لیست محصولات</li>
   </ul>
   <section class="panel">
      <header class="panel-heading">
         <span class="main-tumbnail">لیست محصولات فروشگاه</span>
         <i class="icon-shopping-cart main-tumbnail-icon"></i>
         <form class="search-custom" style="display:none;">
            <input type="text" class="form-control search search-custom" name="search" placeholder="نام محصول را وارد کنید ..." >
         </form>
      </header>
      <table class="table table-striped table-advance table-hover">
         <thead>
            <tr>
               <th>کد محصول</th>
               <th>نام محصول </th>
               <th>دسته بندی محصول</th>
               <th>برند</th>
               <th>قیمت (تومان)</th>
               <th>تعداد (موجودی)</th>
               <th>تصویر شاخص</th>
               <th>عملیات</th>
            </tr>
         </thead>
         <tbody>
            @foreach($products as $product)
				<tr>
				<td>{{ $product->id }} </td>
				<td><a href="#"> {{ $product->name }} </a></td>
				<td><a href="#">{{ $product->cat_name }}</a></td>
				<td>{{ $product->brand }} </td>
				<td>{{ number_format($product->price) }} </td>
				<td>{{ $product->total }} </td>
				<td> <img class="pic" src="{{ $product->image }}" alt="تصویر شاخصی ندارد ."> </td>
				<td style="position:relative;">
					<div class="btn-actions-controller">
						{{--
						@cannot('edit_product',$product)
						<a  href="{{  route('product.edit', $product->id ) }}"><button class="btn btn-default btn-xs"><i class="icon-pencil"></i></button></a>
						@endcannot
						--}}
						<a  href="{{  route('product.gallery', ['id' => $product->id,] ) }}"><button class="btn btn-success btn-xs"><i class="icon-picture"></i></button></a>
						{{-- @can('view', $product) --}}
						<a  href="{{  route('product.edit', $product->name ) }}"><button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button></a>
						{{-- @endcan --}}
						<form  action="{{ route('product.destroy', $product->name ) }}" method="post" style="display:inline;">
							{{ method_field('DELETE') }}
							{{ csrf_field() }}
							<button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button>
						</form>
					</div>
				</td>
				</tr>
            @endforeach
         </tbody>
      </table>
      {{ $products->links() }}
   </section>
</div>
@endsection

