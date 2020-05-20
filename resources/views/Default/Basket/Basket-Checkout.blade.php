@extends('layouts.appwide')
@section('title')
تسویه حساب
@endsection
@section('content')
  <!--Middle Part Start-->
  <div id="content" class="col-sm-12">
    <h1 class="title">تسویه حساب</h1>
    <div class="row">
      <div class="col-sm-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-user"></i> اطلاعات شخصی شما</h4>
          </div>
          <form action="" method="post">
            <div class="panel-body">
                  <fieldset id="account">
                    <div class="form-group required">
                      <label for="input-payment-firstname" class="control-label">نام</label>
                      <input type="text" class="form-control" id="input-payment-firstname" placeholder="نام" value="" name="firstname">
                    </div>
                    <div class="form-group required">
                      <label for="input-payment-lastname" class="control-label">نام خانوادگی</label>
                      <input type="text" class="form-control" id="input-payment-lastname" placeholder="نام خانوادگی" value="" name="lastname">
                    </div>
                    <div class="form-group">
                      <label for="input-payment-email" class="control-label">آدرس ایمیل</label>
                      <input type="text" class="form-control" id="input-payment-email" placeholder="آدرس ایمیل" value="" name="email">
                      <div class="tool-description">برای ارسال گزارش به شما مورد استفاده قرار می گردد و وارد کردن آن اجباری نیست.</div>
                    </div>
                    <div class="form-group required">
                      <label for="input-payment-telephone" class="control-label">شماره تلفن</label>
                      <input type="text" class="form-control" id="input-payment-telephone" placeholder="شماره تلفن" value="" name="telephone">
                    </div>
                  </fieldset>
                </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-book"></i> آدرس شما</h4>
          </div>
            <div class="panel-body">
                  <fieldset id="address" class="required">
                    

                    <div class="form-group required">
                      <label for="input-payment-country" class="control-label">استان</label>
                      <select class="form-control" id="input-payment-country" name="YourState">
                        <option value=""> --- لطفا انتخاب کنید --- </option>
                        <option value="244">Aaland Islands</option>
                      </select>
                    </div>

                    <div class="form-group required">
                      <label for="input-payment-country" class="control-label">شهر</label>
                      <select class="form-control" id="input-payment-country" name="YourCity">
                        <option value=""> --- لطفا انتخاب کنید --- </option>
                        <option value="244">Aaland Islands</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="input-payment-company" class="control-label">نشانی شما</label>
                      <input type="text" class="form-control" id="input-payment-company" placeholder="نشانی" value="" name="YourAddress">
                    </div>

                    <div class="form-group required">
                      <label for="input-payment-address-1" class="control-label">نشانی جایگزین</label>
                      <input type="text" class="form-control" id="input-payment-address-1" placeholder="آدرس 1" value="" name="YourSecondAddress">
                    </div>

                  

                    <div class="form-group required">
                      <label for="input-payment-postcode" class="control-label">کد پستی</label>
                      <input type="text" class="form-control" id="input-payment-postcode" placeholder="کد پستی" value="" name="PostalCode">
                    </div>
                
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" checked="checked" value="1" name="AddressOK">
                        آدرس فاکتور با آدرس محل تحویل یکسان است.</label>
                    </div>
                  </fieldset>
                </div>
        </div>
      </div>
      <div class="col-sm-8">
        <div class="row">
          <div class="col-sm-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title"><i class="fa fa-truck"></i> شیوه ی ارسال</h4>
              </div>
                <div class="panel-body">
                  <p>لطفا یک شیوه حمل و نقل انتخاب کنید.</p>
                  <div class="radio">
                    <label>
                      <input type="radio" name="TypeSend" value="single">
                      ارسال به صورت یکجا - 
                      {{ number_format(5000) }} 
                      تومان</label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="TypeSend" value="multiple">
                      ارسال هر آیتم به صورت جداگانه -
                      
                    <?php
                    foreach($clientBaskets as $clientBasket)
                      $singlePostCurency = $clientBasket->count * 5000;
                    ?>
                    
                    
                    {{ number_format($singlePostCurency)}}
                       تومان</label>
                  </div>
                </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title"><i class="fa fa-credit-card"></i> شیوه پرداخت</h4>
              </div>
                <div class="panel-body">
                  <p>لطفا یک شیوه پرداخت برای سفارش خود انتخاب کنید.</p>
                  <div class="radio">
                    <label>
                      <input type="radio" checked="checked" name="TypePay" value="offline">
                      پرداخت هنگام تحویل</label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="TypePay" value="online">
                       پرداخت آنلاین
                       </label>
                  </div>
                </div>
            </div>
          </div>

          <div class="col-sm-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title"><i class="fa fa-ticket"></i>کوپن تخفیف</h4>
              </div>
                <div class="panel-body">
                  <label for="input-coupon" class="col-sm-4 control-label">کد تخفیف خود را وارد کنید</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="input-coupon" placeholder="کد تخفیف خود را در اینجا وارد کنید" value="" name="Coupon">
                    <span class="input-group-btn">
                    <input type="button" class="btn btn-primary" data-loading-text="بارگذاری ..." id="button-coupon" value="اعمال کوپن">
                    </span></div>
                </div>
            </div>
          </div>

          <!-- Basket Start !-->
          <div class="col-sm-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title"><i class="fa fa-shopping-cart"></i> سبد خرید</h4>
              </div>
                <div class="panel-body">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <td class="text-center">تصویر</td>
                          <td class="text-left">نام محصول</td>
                          <td class="text-left">تعداد</td>
                          <td class="text-right">قیمت واحد</td>
                          <td class="text-right">کل</td>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($clientBaskets as $clientBasket)
                          <tr>
                                <td class="text-center"><a href="{{ route('products.show', $clientBasket->product_data->name) }}"><img src="{{ $clientBasket->product_data->image }}" alt="{{ $clientBasket->product_data->name }}" title="{{ $clientBasket->product_data->name }}" class="img-thumbnail"></a></td>
                                <td class="text-left"><a href="{{ route('products.show', $clientBasket->product_data->name) }}">{{ $clientBasket->product_data->name }}</a></td>
                                <td class="text-left"><div class="input-group btn-block" style="max-width: 200px;">
                                    <input type="text" readonly value="{{ $clientBasket->count }}" size="1" class="form-control">
                                    <span class="input-group-btn">
                                    
                                    <form action="{{ route('basket.destroy', ['basket' => $clientBasket->id] ) }}" method="post"  style="display:inline !important;">
                                      @csrf
                                      @method('DELETE')
                                      {{-- <button type="button" data-toggle="tooltip" title="حذف" class="btn btn-danger" onClick=""><i class="fa fa-times-circle"></i></button> --}}
                                      <button type="submit" data-toggle="tooltip" title="حذف" class="btn btn-danger" style="border-radius: 1px;margin-right: 5px;"> <i class="fa fa-times-circle"></i></button>
                                    </form>
                                    </span>
                                  </div>
                                </td>
                                <td class="text-right">{{ number_format($clientBasket->product_data->dis_price) }} تومان</td>
                                <td class="text-right">{{ number_format($clientBasket->product_data->dis_price * $clientBasket->count) }} تومان</td>
                              </tr>
                              @endforeach  

                      </tbody>
                      <tfoot>
                        <tr style="background:#caf9cd;">
                          <td class="text-right" colspan="4"><strong>جمع کل:</strong></td>
                          <td class="text-right">{{ number_format($sumProduct + 5000)}} تومان</td>
                        </tr>
                        <tr>
                          <td class="text-right" colspan="4"><strong>هزینه ارسال:</strong></td>
                          <td class="text-right">{{ number_format(5000) }} تومان</td>
                        </tr>
                                                 
                        {{--<tr>
                          <td class="text-right" colspan="4"><strong>کسر هدیه (کوپن)</strong></td>
                          <td class="text-right">4000 تومان</td>
                        </tr> --}}

                        <tr>
                          <td class="text-right" colspan="4"><strong>کل :</strong></td>
                          <td class="text-right">{{ number_format($sumProduct) }} تومان</td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
            </div>
          </div>
          <!-- Basket End !-->

          <div class="col-sm-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title"><i class="fa fa-pencil"></i> افزودن توضیح برای سفارش.</h4>
              </div>
                <div class="panel-body">
                  <textarea rows="4" class="form-control" id="confirm_comment" name="YourDescription"></textarea>
                  <br>
                  <label class="control-label" for="confirm_agree">
                    <input type="checkbox" checked="checked" value="1" required="" class="validate required" id="confirm_agree" name="ConfirmAgree">
                    <span><a class="agree" href="#"><b>شرایط و قوانین</b></a> را خوانده ام و با آنها موافق هستم.</span> </label>
                  <div class="buttons">
                    <div class="pull-right">
                      <input type="button" class="btn btn-primary" id="button-confirm" value="تایید سفارش">
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Middle Part End -->
  @endsection