@extends('layouts.Admin.dashbord')
@section('title')فیلتر محصولات @stop 
@section('content')
	<section class="panel">
                <header class="panel-heading">
                    محصولات و ویژگی ها
                </header>
                <table class="table table-striped table-advance table-hover">
                    <thead>
                        <tr>
                            <th></i>کد محصول</th>
                            <th></i>نام محصول</th>
                            <th></i>دسته بندی محصول</th>
                            <th>تصویر   <i class="icon-picture"></i></th>
                            <th>افزودن ویژگی</th>
                            <th>مشاهده</th>
                            <th>حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($products as $product)			
                            <tr>
                                <td>{{ $product->id }} </td>
                                <td><a href="{{ route('products.show', $product->name) }}" target="_blank"> {{ $product->name }} </a></td>
                                <td><a href="#">{{ $product->cat_name }}</a></td>
                                <td> <img class="pic" src="{{ $product->image }}" alt="Lorem Pixel" style="width: 70px;"> </td>
                                <td><div class="btn-actions-controller"><a  href="{{  route('product-filter.create', ['product' => $product->id]) }}"><button class="btn btn-success btn-xs"><i class="icon-plus"></i></button></a></div></td>
                                <td><div class="btn-actions-controller"><a  href="{{  route('product-filter.showProperty', $product->name) }}"><button class="btn btn-primary btn-xs"><i class="icon-eye-open"></i></button></a></div></td>
                                <td><div class="btn-actions-controller"><a href="{{  route('product-filter.delete', $product->name) }}""><button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button></a></div></td>
                            </tr>
                        @endforeach
                                
                    </tbody>
                </table>
                {{ $products->links() }}
            </section>				
@endsection