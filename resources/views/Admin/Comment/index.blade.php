@extends('layouts.Admin.dashbord')
@section('title') دیدگاه های تایید نشده @stop 
@push('CustomScript')
<script src="{{ asset('PubAdmin/js/AlertPlugin/sweetalert.js') }}"></script>
<script src="{{ asset('PubAdmin/js/customJs/commentControl.js') }}"></script>
@endpush
@section('content')
	<section class="panel">
			<header class="panel-heading">
				<span class="main-tubmnail"> دیدگاه ها</span>
			</header>

	@if($comments->count()!=0) 
		<table class="table table-striped table-advance table-hover" id="comments-waitlist">
			<thead>
				<tr>
					<th>نام کاربر</th>
					<th>نام محصول</th>
					<th>خلاصه دیدگاه</th>
					<th> زمان ثبت دیدگاه <i class="icon-time" style="vertical-align: -3px;font-size: 19px;margin-right: 2px;"></li> </th>
					<th>تایید دیدگاه</th>
					<th>ویرایش دیدگاه</th>
					<th>انتقال به زباله دان</th>
					<th>حذف برای همیشه</th>
				</tr>
			</thead>
			<tbody>
					@foreach($comments as $comment)
					<tr>
						<td>{{ $comment->user->name }} </td>
					<td><a href="{{ route('products.show', $comment->product->name) }}">{{ $comment->product->name }}</a></td>
						<td> {{ $comment->sub_body . " ... " }} </td>
						<td> {{ $comment->dif_time }}</td>
						<td class="btn-actions-controller">
						<button class="btn btn-success btn-xs verfy-comment" data-id="{{ $comment->id }}" ><i class="icon-ok-sign"></i></button>
						</td>
						<td>
							<a  class="btn-actions-controller" href="{{  route ('comment.edit',$comment->id ) }}"><button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button></a>
						</td>
						<td class="btn-actions-controller">
							<a  href="{{  route ('comment.trash.create',$comment->id ) }}"><button class="btn btn-warning btn-xs"><i class="icon-bitbucket"></i></button></a>
						</td>
						<td class="btn-actions-controller">
							<form  action="{{ route('comment.destroy', $comment->id ) }}" method="post" style="display:inline;">
								@csrf
								@method('DELETE')
								<button class="btn btn-danger btn-xs remove-comment"><i class="icon-trash "></i></button>
							</form>
						</td>

					</tr>
					
						@endforeach
						@else
						<div class="alert alert-danger">موردی برای نمایش وجود ندارد</div>
			</tbody>
		</table>
		{{ $comments->links() }}
	@endif
	</section>
@endsection
