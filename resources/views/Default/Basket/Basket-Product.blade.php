 
@extends('layouts.appwide')
@section('content')

            @if(session()->has('ErrorCount'))
                <div class="alert alert-block alert-warning fade in">
                    <i class="fa fa-times"></i>
                    {{ Session::get('ErrorCount') }}
                </div>
            @endif

            @if(session()->has('BasketUpdate'))
                <div class="alert alert-block alert-success fade in">
                    <i class="fa fa-times"></i>
                    {{ Session::get('BasketUpdate') }}
                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                </div>
            @endif
                    <!--Middle Part Start-->                    
                        <h1 class="title l-b">
                            <span>سبد خرید شما</span>     
                            <i class="fa fa fa-shopping-cart" style="font-size: 45px;"></i>
                        </h1>
                        @if($clientBaskets->count() != 0)
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td class="text-center">تصویر</td>
                                        <td class="text-left">نام محصول</td>
                                        <td class="text-left">مدل</td>
                                        <td class="text-left">تعداد</td>
                                        <td class="text-right">قیمت واحد</td>
                                        <td class="text-right">کل (بدون احتساب تخفیف)</td>
                                        <td class="text-right">درصد تخفیف</td>
                                        <td class="text-right">قابل پرداخت</td>
                                    </tr>
                                </thead>
                                <tbody>

                                    <!-- Basket Start Items !-->
                                    <?php $disValue=0; ?>
                                    @foreach ($clientBaskets as $key => $basket)
                                        <tr>
                                            <td class="text-center">
                                            <a href="{{ route('products.show', $basket->product_data->name) }}"><img src="{{ $basket->product_data->image }}" alt="*" style="width: 52px;" title="{{ $basket->product_data->name }}" class="img-thumbnail" /></a>
                                            </td>
                                        <td class="text-left" ><a href="{{ route('products.show', $basket->product_data->name) }}">{{ $basket->product_data->name }}</a><br /></td>
                                            <td class="text-left">{{ $basket->product_data->brand }}</td>
                                            <td class="text-left">
                                                <div class="input-group btn-block quantity">
                                                <input type="number" name="quantity" value="{{ $basket->count }}" size="1" max="{{ $basket->product_data->total}}" class="form-control change-count" style="width:60%"; data-static-price="{{ $basket->product_data->price }}" data-discount="{{ $basket->product_data->discount }}" data-final-price="{{ $basket->product_data->price * $basket->count }}" data-key="{{ $key }}" data-limit="{{ $basket->product_data->total}} "/>                                                    
                                                    <form action="{{ route('basket.destroy', ['basket' => $basket->id] ) }}" method="post"  style="display:inline !important;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" data-toggle="tooltip" title="حذف" class="btn btn-danger" style="border-radius: 1px;margin-right: 5px;"> <i class="fa fa-times-circle"></i></button>
                                                        
                                                    </form>
                                                </div>
                                            </td>
                                            <td class="text-right">{{ number_format($basket->product_data->price) }} تومان</td>
                                            <td class="text-right final-count">{{ number_format($basket->product_data->price * $basket->count ) }} تومان</td>
                                            <td class="text-right">% {{ $basket->product_data->discount }} </td>
                                            <td class="text-right final-pay">{{ number_format( $basket->product_data->dis_price * $basket->count ) }} تومان</td>
                                        </tr>
                                        <?php 
                                        for($i=0; $i < $basket->count; $i++)
                                            $disValue=$disValue+$basket->product_data->dis_value;
                                         ?>

                                        
                                        
                                        
                                    @endforeach
                                    <!-- Basket End Items !-->

                                </tbody>
                            </table>

                            <div class="col-sm-4 col-sm-offset-8" style="padding: 0px !important;">
                                <table class="table table-bordered">
                                    <tr>
                                        <td class="text-right"><strong>جمع کل (بدون تخفیف):</strong></td>
                                        <td class="text-right" id="sum-all">{{ number_format($sumProduct) }} تومان</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>مقدار تخفیف:</strong></td>
                                        <td class="text-right" id="sum-discount">{{ number_format($disValue) }} تومان</td>
                                    </tr>
                                    <tr style="background:#caf9cd;">
                                        <td class="text-right"><strong>قابل پرداخت :</strong></td>
                                        <td class="text-right" id="sum-pay">{{ number_format($sumProduct - $disValue ) }} تومان</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                      
                        

                    {{-- Create Form Given New Data From Server Start --}}
                    <form action="{{ route('basket.update') }}" method="POST" style="visibility: hidden; padding:0px; margin:0px;" id="basket-update">
                        @csrf
                        @method('PATCH');
                        @foreach ($clientBaskets as $key => $basket)
                            <input type="hidden" value="{{ $basket->id }}" name="basket[{{ $key }}]" id="basket-{{ $key }}">
                            <input type="hidden" value="{{ $basket->count }}" name="count[{{ $key }}]" id="count-{{ $key }}">
                        @endforeach
                
                    <div class="buttons" style="visibility: visible !important;">
                        <div class="pull-left"><button class="btn btn-default" type="submit">تسویه حساب</button></div>
                    </div>
                </form>
                {{-- Create Form Given New Data From Server End --}}
                <!--Middle Part End -->
                    @else
                        سبد خرید شما خالی است از منو های بالا برای پیدا کردن محصول مورد نظر خود اقدام فرمایید
                    @endif
@endsection

       