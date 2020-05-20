@extends('layouts.UserPanel.dashbord')
@section('title')
ارسال تیکت پشتیبانی
@endsection
@section('breadcrumb')
<li class="breadcrumb-item active">تیکت ها</li>
<li class="breadcrumb-item active">ارسال تیکت</li>
@endsection
@section('UserContent')
<div class="row">
<div class="col-12">
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">ارسال تیکت پشتیبانی
            <i class="nav-icon fa fa-envelope-o"></i>
        </h3>
        
    </div>

    <!-- form start -->
    <form class="form-horizontal" action="{{ route('user.ticket.store') }}" method="POST">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="ticket-title" class="col-sm-2 control-label">عنوان تیکت</label>
          <input type="text" name="ticketTitle" class="form-control" id="ticket-title" placeholder="عنوان تیکت را وارد کنید ...">
        </div>

        <div class="form-group">
            <label>اولویت</label>
            <select class="form-control" name="priority">
              <option selected value="normal">معمولی</option>
              <option value="greate">متوسط</option>
              <option value="very_much">بحرانی</option>
            </select>
          </div>

        <div class="form-group">
          <label for="ticket-text" class="col-sm-2 control-label">متن تیکت</label>
          <textarea class="form-control" name="ticketBody" id="ticket-text" rows="3" placeholder="متن تیکت را وارد کنید ..."></textarea>
        </div>
        
      <!-- Button Started  -->
      <div class="card-footer">
        <button type="submit" class="btn btn-success">ارسال</button>
        <button type="submit" class="btn btn-default float-left">لغو</button>
      </div>
      <!-- Button End  !-->
    </form>
  </div>
</div>
</div>
    @if(session()->has('sendTicket'))
        <script>
            $(document).ready(function(){
                setTimeout(function(){
                    Swal.fire({
                        icon: 'success',
                        title: 'ارسال موفق',
                        text: 'تیکت شما ارسال شد منتظر نتیجه آن باشید',
                        confirmButtonText: 'باشه مرسی',
                    });
                }, 500);
            });
        </script>
    @endif

  @endsection