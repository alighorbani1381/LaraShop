@extends('layouts.Admin.dashbord')
@section('title') تیکت های مهمان @stop 
@push('CustomScript')
<script src="{{ asset('PubAdmin/js/AlertPlugin/sweetalert.js') }}"></script>
{{-- <script src="{{ asset('PubAdmin/js/customJs/commentControl.js') }}"></script> --}}
@endpush
@section('content')
	<section class="panel">
			<header class="panel-heading">
				<span class="main-tubmnail">تیکت های مهمان</span>
			</header>

	@if($gustTickets->count()!=0) 
		<table class="table table-striped table-advance table-hover" id="comments-waitlist">
			<thead>
				<tr>
					<th>نام کاربر</th>
					<th>عنوان تیکت</th>
					<th>خلاصه تیکت</th>
					<th> زمان ثبت تیکت <i class="icon-time" style="vertical-align: -3px;font-size: 19px;margin-right: 2px;"></li> </th>
					<th>مشاهده و پاسخ دهی</th>
					<th>حذف برای همیشه</th>
				</tr>
			</thead>
			<tbody>
					@foreach($gustTickets as $gustTicket)
					<tr>
						<td>{{ $gustTicket->user_name }} </td>
						<td>{{ $gustTicket->ticket_title }}</a></td>
						<td> {{ $gustTicket->sub_body . " ... " }} </td>
						<td> {{ $gustTicket->dif_time }}</td>
						<td class="btn-actions-controller">
							<a  href="{{ route('ticket.gust.show', $gustTicket->id ) }}"><button class="btn btn-success btn-xs"><i class="icon-eye-open"></i></button></a>
						</td>
						<td class="btn-actions-controller">
							<form  action="{{ route('ticket.gust.destroy', $gustTicket->id ) }}" method="post" style="display:inline;">
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
		{{ $gustTickets->links() }}
	@endif
	</section>
@endsection
