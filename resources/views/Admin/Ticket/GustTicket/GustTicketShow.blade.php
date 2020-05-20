@extends('layouts.Admin.dashbord')
@section('title') مشاهده تیکت مهمان @stop 
@push('CustomScript')
<script src="{{ asset('PubAdmin/js/AlertPlugin/sweetalert.js') }}"></script>
@endpush
@section('content')
			<ul class="breadcrumb">
					<li><a href="dashbord"><i class="icon-home"></i>داشبورد</a></li>
					<li><a href="{{ route('ticket.gust.index') }}"> تیکت های مهمان </a></li>
					<li class="active">جزئیات و پاسخ</li>
			</ul>
<div class="row">
<div class="col-lg-8 col-lg-offset-2">
<section class="panel">
<header class="panel-heading">
پاسخ به  تیکت مهمان
</header>
<div class="panel-body">
  <form role="form" action="{{ route('ticket.answer.store') }}" method="post">
    @csrf
      <div class="form-group">
        <label>عنوان تیکت</label>
        <div class="form-control" id="disabledInput">
          {{ $ticket->ticket_title }}
        </div>
     </div> 

        <div class="form-group">
          <label for="comment_text">متن تیکت کاربر</label>
          <span style="display:none;" id="oldTicket">{{ $ticket->ticket_body }}</span>
           <textarea class="form-control editor-cv" name="user_ticket_text" id="comment_text" disabled>{{ $ticket->ticket_body }}</textarea>
           <input type="hidden" name="user_ticket_id" value="{{ $ticket->id }}">
	  	</div> 
		
		@if($errors->has('title'))
			<div class="alert alert-block alert-danger fade in">
               <button data-dismiss="alert" class="close close-sm" type="button">
                  <i class="icon-remove"></i>
                </button>
				{{ $errors->first('title') }}
           </div>
        @endif
        
        <div class="form-group">
          <div class="pretty p-icon p-curve p-pulse" style="position:absolute !important; right:0px;">
            <input type="checkbox" id="changeTicket" value="0">
            <div class="state p-info-o" style="display:inline !important; margin-left:7px !important ">
                <label style="margin-left:15px !important">تغییر متن تیکت</label>
                <i class="icon mdi mdi-check"></i>
            </div>
        </div>
      </div> 

        <div class="panel-heading"></div><br><br>

         <div class="form-group">
            <label for="comment_text">پاسخ به این تیکت</label>
           <textarea class="form-control editor-cv" name="answer_ticket" placeholder="متن پاسخ را اینجا وارد کنید ..."></textarea>
        </div> 

        

            
    
	<button type="" class="btn btn-success" name="submit">
		<div class="button">
			<div class="container">
				<div class="tick">
				</div>
			</div>
		</div>  
</button>

</form>
</div>

</section>
</div></div>

<script>
  $(document).ready(function(){
    $('#changeTicket').prop('checked', false);  
  });
  $('#changeTicket').click(function(){
   if( $(this). is(":checked") ){
    $('#comment_text').prop('disabled', false);
    Swal.fire({
      title: 'آیا مطمئنی که میخوایی این کارو بکنی؟',
      text: "شما به عنوان مدیر سایت می تونید متن تیکت رو تغییر بدین ولی این کار رو نکنید بهتره چون متن یا سوال کاربرتون رو تغییر میدین !",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'نه بیخیال',
      cancelButtonText: 'آره مطمئنم',
    }).then((result) => {
      if (result.value) {
        $('#comment_text').prop('disabled', true);
        $('#changeTicket').prop('checked', false);
      }
    });
  
   }
   else{
   var oldTicket=$('#oldTicket').text();
   $('textarea#comment_text').text(oldTicket);
   $('textarea#comment_text').hide().val(oldTicket.toString()).fadeIn('fast');
   $('#comment_text').prop('disabled', true);
   
   }
  
  });
let button = document.querySelector('.button');
let buttonText = document.querySelector('.tick');

const tickMark = "<svg width=\"15\" height=\"32\" viewBox=\"0 0 58 45\" xmlns=\"http://www.w3.org/2000/svg\"><path fill=\"#fff\" fill-rule=\"nonzero\" d=\"M19.11 44.64L.27 25.81l5.66-5.66 13.18 13.18L52.07.38l5.65 5.65\"/></svg>";

buttonText.innerHTML = "ثبت پاسخ";

button.addEventListener('click', function() {

	
  if (buttonText.innerHTML !== "ثبت پاسخ") {
    buttonText.innerHTML = "ثبت پاسخ";
	
  } else if (buttonText.innerHTML === "ثبت پاسخ") {
    buttonText.innerHTML = tickMark;
  }
  this.classList.toggle('button__circle');
  $('textarea#comment_text').prop('disabled', false);
  if( $('textarea#comment_text').prop('disabled') == false)
    $("form").submit(function(){}); 

  

});
</script>

<style>

#subset{
	font-size: small;
}

.button, .tick {
  display: flex;
  justify-content: center;
  align-items: center;
  font-family: IRANSANSWEB !important;
}


.button {
  width: max-content;
  height: max-content;
  border-radius: 6px;
  transition: all .3s cubic-bezier(0.67, 0.17, 0.40, 0.83);
}

.button svg {
  transform: rotate(180deg);
  transition: all .5s;
}

.button__circle {
  width: 25px;
  height: 25px;
  background: #78CD51;
  border-radius: 50%;
  transform: rotate(-180deg);
}

.button:hover {
  cursor: pointer;
}

.tick {
  color: white;
  font-size: 15px;
  transition: all .9s;
}
</style>
@endsection