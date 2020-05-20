@extends('layouts.UserPanel.dashbord')
@section('title')
مشاهده تیکت
@endsection
@section('breadcrumb')
<li class="breadcrumb-item active">لیست تیکت ها</li>
<li class="breadcrumb-item active">مشاهده تیکت</li>
@endsection
@section('UserContent')
<div class="row">    
  <div class="col-lg-12">
      <div class="card" style="margin-bottom: 0 !important;">
        
          <div class="card direct-chat direct-chat-success" style="margin-bottom: 0 !important;">
            <div class="card-header ui-sortable-handle" style="cursor: move; ">
              <h3 class="card-title">مشاهده تیکت شما</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">


                <!-- User Ticket Message Start -->
                <div class="direct-chat-msg right">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name float-right">شما</span>
                    <span class="direct-chat-timestamp float-left j-time">{{ verta($ticket->created_at)->format('Y/n/j H:i') }}</span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="/PubUser/dist/img/user3-128x128.jpg" alt="message user image">
                  <!-- /.direct-chat-img -->
                  <div class="direct-chat-text sel-tick">
                    <div class="chat-head">{{ $ticket->ticket_title }}</div>
                      {{ $ticket->ticket_body }}
                   </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- User Ticket Message End -->

                @if($answer != null)
                <!-- Message. Default to the left -->
                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name float-left">بخش پشتیبانی</span>
                    <span class="direct-chat-timestamp float-right j-time">{{ verta($answer->created_at)->format('Y/n/j H:i') }}</span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="/PubUser/dist/img/user1-128x128.jpg" alt="message user image">
                  <!-- /.direct-chat-img -->
                  <div class="direct-chat-text ans-tick">
                    {{ $answer->answer_text }}
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->
                @else
                  <div class="alert alert-warning">
                    <i class="nav-icon fa fa-circle-o text-default"></i>
                    تیکت شما ارسال شده پس از مشاهده توسط تیم پشتیبانی به شما پاسخ خواهند داد    
                    و با مراجعه به همین قسمت پاسخ خود را مشاهده کنید.
                  </div>
                @endif

              

              </div>
              <!--/.direct-chat-messages-->
            </div>

          </div>

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
<style>
  .direct-chat-msg{
    margin-bottom: 30px;
  }

  .chat-head {
	margin-bottom: 7px;
	background: #f1fff1;
	min-width: 199px;
	padding: 3px;
	border-radius: 4px 3px 3px 27px;
	color: black;
	width: max-content;
}
.sel-tick{
	background: #61ca52 !important;
  border-left-color:#61ca52 !important;
  border-color:#61ca52 !important;
}
.ans-tick{
  background: #eaeaea !important;
  border-color: #eaeaea !important;
}

</style>
@endsection

