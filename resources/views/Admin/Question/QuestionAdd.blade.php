@extends('layouts.Admin.dashbord')
@section('title')  افزودن سوال جدید  @stop
@push('CustomScript')
	<script src="{{ asset('PubAdmin/js/customJs/question.js') }}"></script> 
@endpush
@section('content')
	<ul class="breadcrumb">
			<li><a href="dashbord"><i class="icon-home"></i>داشبورد</a></li>
			<li><a href="{{ route('question.index') }}">مدیریت سوالات ها</a></li>
			<li class="active">افزودن</li>
	</ul>
<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
		<section class="panel">
			<header class="panel-heading">
				افزودن (سوال | دسته بندی) جدید
			</header>

			<div class="panel-body">
				<form role="form" action="{{ route('question.store') }}" method="post" enctype="multipart/form-data">
					@csrf

				
					<div class="form-group">
						<label for="exampleInputEmail1" id="question-text">عنوان دسته بندی</label>
						<input type="text"  name="question_text" value="{{ old('question_text') }}" class="form-control" id="exampleInputEmail1" placeholder="عنوان دسته بندی سوالات را وارد کنید ..." style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: left center; cursor: auto;">
					</div>

					<div class="form-group">
						<label for="exampleInputEmail1">دسته بندی سوالات</label>
						<select class="form-control m-bot15" name="subset">
							<option value="0"> سرگروه </option>
							@foreach($ًquesionsCategories as $quesionsCategory)
								<option value="{{ $quesionsCategory->id }}"> {{ $quesionsCategory->question_text }} </option>
							@endforeach
						</select>
					</div>

					
					@if($errors->has('question_text'))
					<div class="alert alert-block alert-danger fade in">
						<button data-dismiss="alert" class="close close-sm" type="button">
							<i class="icon-remove"></i>
						</button>
						وارد کردن متن سوال الزامی است
					</div>
					@endif
				

					<div class="form-group" id="answer-question" style="display: none;">
						<label for="page-content">پاسخ سوال</label>
						<textarea name="answer" value="{{ old('answer') }}"   class="form-control" id="page-content" placeholder="پاسخ سوال را در اینجا بنویسید ..."></textarea>
					</div>
				
						<div class="form-group" id="shareBox" style="display: none;">
							<label for="status_share">وضعیت انشار</label>

							<div class="pretty p-icon p-round p-pulse">
								<input type="radio"  name="status" value="enable" id="status_share" checked>
								<div class="state p-success">
									<label>منتشر شود</label>	&nbsp; &nbsp; &nbsp; &nbsp;
									<i class="icon mdi mdi-check"></i>
								</div>
							</div>

							<div class="pretty p-icon p-round p-pulse">
								<input type="radio"  name="status" value="draft">
								<div class="state p-warning">
									<label>پیش نویس</label>	&nbsp; &nbsp; &nbsp; &nbsp;
									<i class="icon mdi mdi-check"></i>
								</div>
							</div>

						</div>

					<button type="submit" class="btn btn-success" name="submit">افزودن سوال</button>
				</form>

			</div>

		</section>
	</div>
</div>
@endsection