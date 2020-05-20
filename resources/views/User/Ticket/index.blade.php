@extends('layouts.UserPanel.dashbord')
@section('title')
تیکت های پشتیبانی
@endsection
@section('breadcrumb')
<li class="breadcrumb-item active">لیست تیکت ها</li>
@endsection
@section('UserContent')<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">لیست تیکت های شما</h3>
        </div>

        {{-- Table Start --}}
        <div class="card-body table-responsive p-0">
          <table class="table table-hover">
            <tbody>
                <tr>
                    <th>ردیف</th>
                    <th>تاریخ و زمان ثبت</th>
                    <th>عنوان تیکت</th>
                    <th>وضعیت تیکت</th>
                    <th>خلاصه تیکت</th>
                    <th>مشاهده</th>
                </tr>

                @foreach($userTickets as $key => $userTicket)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td class="j-time"> {{ verta($userTicket->created_at)->format('Y/n/j H:i') }}</td>
                        <td>{{ $userTicket->ticket_title }}</td>
                        <td>
                            @if($userTicket->status == 'answered')
                                <span class="badge badge-success s-n">پاسخ داده شده</span>
                            @else
                                <span class="badge badge-warning s-n">در انتظار بررسی</span>
                            @endif
                        </td>
                        <td>{{ $userTicket->sub_body }} ...</td>
                        <td>
                          <a href="{{ route('user.ticket.show', $userTicket->id) }}"><button class="btn btn-primary"><i class="nav-icon fa fa-eye"></i></button></a>
                        </td>
                    </tr>
                    
                  
                  
                @endforeach
          </tbody>
        </table>
        </div>
        {{-- Table End --}}
        {{ $userTickets->links() }}
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

