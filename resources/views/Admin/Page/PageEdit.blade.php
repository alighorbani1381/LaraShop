@extends('layouts.Admin.dashbord')
@section('title') ویرایش برگه  @stop
@push('CustomScript')
<script src="{{ asset('PubAdmin/js/ckeditor/ckeditor.js') }}"></script>
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@endpush
@section('content')
	<ul class="breadcrumb">
			<li><a href="dashbord"><i class="icon-home"></i>داشبورد</a></li>
			<li><a href="{{ route('page.index') }}">مدیریت برگه ها</a></li>
			<li class="active">ویرایش</li>
	</ul>
<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
		<section class="panel">
			<header class="panel-heading">
                ویرایش برگه
              ({{ $page->title }})
			</header>

			<div class="panel-body">
				<form role="form" action="{{ route('page.update', $page->english_name) }}" method="post" enctype="multipart/form-data">
					@csrf
					@method('PATCH')

					<div class="form-group">
						<label for="page-title">عنوان برگه</label>
						<input type="text"  name="title" value="{{ $page->title }}" class="form-control" id="page-title" placeholder="عنوان برگه را وارد کنید ..." style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: left center; cursor: auto;">
                    </div>
                    
                    <div class="form-group">
						<label for="english_name">نام انگلیسی برگه</label>
						<input type="text"  name="english_name" value="{{ $page->english_name }}" class="form-control" id="english_name" placeholder="برای نمایش در URL ها استفاده می شود" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: left center; cursor: auto;">
					</div>

					<div class="form-group">
						<label for="description">شرح برگه</label>
						<input type="text"  name="description" value="{{ $page->description }}" class="form-control" id="description" placeholder="تنها برای نویسنده قابل مشاهده است ..." style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: left center; cursor: auto;">
					</div>
					
					@if($errors->has('title'))
					<div class="alert alert-block alert-danger fade in">
						<button data-dismiss="alert" class="close close-sm" type="button">
							<i class="icon-remove"></i>
						</button>
						وارد کردن عنوان برگه الزامی است
					</div>
					@endif


					<div class="form-group">
						<label for="page-content">محتوای برگه</label>
						<textarea name="body" value="{{ old('body') }}"   class="form-control editor-cv" id="page-content" placeholder="محتوای برگه را در اینجا قرار دهید...">{{ $page->body }}</textarea>
				</div>
				
					@if($errors->has('body'))
						<div class="alert alert-block alert-danger fade in">
							<button data-dismiss="alert" class="close close-sm" type="button">
								<i class="icon-remove"></i>
							</button>
							وارد کردن محتوای برگه الزامی است
						</div>
					@endif
				
						<div class="form-group">
							<label for="status_share">وضعیت انشار</label>

							<div class="pretty p-icon p-round p-pulse">
								<input type="radio"  name="status" value="enable" id="status_share" @if($page->shared == 'enable') checked @endif >
								<div class="state p-success">
									<label>منتشر شود</label>	&nbsp; &nbsp; &nbsp; &nbsp;
									<i class="icon mdi mdi-check"></i>
								</div>
							</div>

							<div class="pretty p-icon p-round p-pulse">
								<input type="radio"  name="status" value="draft" @if($page->shared == 'draft') checked @endif>
								<div class="state p-warning">
									<label>پیش نویس</label>	&nbsp; &nbsp; &nbsp; &nbsp;
									<i class="icon mdi mdi-check"></i>
								</div>
							</div>

							<div class="pretty p-icon p-round p-pulse">
								<input type="radio"  name="status" value="disable" @if($page->shared == 'disable') checked @endif>
								<div class="state p-danger">
									<label>منتشر نشود</label>	&nbsp; &nbsp; &nbsp; &nbsp;
									<i class="icon mdi mdi-check"></i>
								</div>
							</div>

						</div>

					<button type="submit" class="btn btn-warning" name="submit">ویرایش برگه</button>
				</form>

			</div>
			<script>
				CKEDITOR.replace( 'page-content' ); 
			 </script>
		</section>
	</div>
</div>
@endsection