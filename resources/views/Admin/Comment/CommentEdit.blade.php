@extends('layouts.Admin.dashbord')
@section('title') ویرایش دیدگاه @stop 
@section('content')
			<ul class="breadcrumb">
					<li><a href="dashbord"><i class="icon-home"></i>داشبورد</a></li>
					<li><a href="{{ route('role.index') }}">  دیدگاه ها </a></li>
					<li class="active">ویرایش</li>
			</ul>
<div class="row">
<div class="col-lg-8 col-lg-offset-2">
<section class="panel">
<header class="panel-heading">
فرم ویرایش دیدگاه
</header>
<div class="panel-body">
    <form role="form" action="{{ route('comment.update',$comment->id) }}" method="post">
    @csrf
    @method('PATCH')

      <div class="form-group">
        <label>اطلاعات دیدگاه</label>
        <div class="form-control" id="disabledInput">
          نظر
          {{ $user->name }}  
          در مورد محصول
          {{ $product->name }}
        </div>
     </div> 

        <div class="form-group">
          <label for="comment_text">متن دیدگاه</label>
           <textarea class="form-control" name="body" id="comment_text">{{ $comment->body }}</textarea>
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
      <label for="disabledInput">وضعیت انشار</label>
      <div class="pretty p-icon p-round p-pulse">
        <input type="checkbox"  name="status" value="1" id="disabledInput" />
        <div class="state p-success">
          <label>منتشر شود</label>	&nbsp; &nbsp; &nbsp; &nbsp;
          <i class="icon mdi mdi-check"></i>
        </div>
      </div>
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
	let button = document.querySelector('.button');
let buttonText = document.querySelector('.tick');

const tickMark = "<svg width=\"15\" height=\"32\" viewBox=\"0 0 58 45\" xmlns=\"http://www.w3.org/2000/svg\"><path fill=\"#fff\" fill-rule=\"nonzero\" d=\"M19.11 44.64L.27 25.81l5.66-5.66 13.18 13.18L52.07.38l5.65 5.65\"/></svg>";

buttonText.innerHTML = "ویرایش";

button.addEventListener('click', function() {

	

  if (buttonText.innerHTML !== "ویرایش") {
    buttonText.innerHTML = "ویرایش";
	
  } else if (buttonText.innerHTML === "ویرایش") {
    buttonText.innerHTML = tickMark;
  }
  this.classList.toggle('button__circle');
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