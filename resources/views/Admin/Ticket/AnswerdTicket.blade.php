@extends('layouts.Admin.dashbord')
@section('title') تیکت های بسته شده @stop 
@push('CustomScript')
<script src="{{ asset('PubAdmin/js/AlertPlugin/sweetalert.js') }}"></script>
<style>.time-ticket{direction: ltr !important;}</style>
{{-- <script src="{{ asset('PubAdmin/js/customJs/commentControl.js') }}"></script> --}}
@endpush
@section('content')
	<section class="panel">
			<header class="panel-heading">
				<span class="main-tubmnail">تیکت های بسته شده</span>
			</header>

	@if($answeredTickets->count()!=0) 
		<table class="table table-striped table-advance table-hover" id="comments-waitlist">
			<thead>
				<tr>
					<th>نوع کاربر</th>
					<th>عنوان تیکت</th>
					<th>خلاصه تیکت</th>
					<th> زمان ثبت تیکت <i class="icon-time" style="vertical-align: -3px;font-size: 19px;margin-right: 2px;"></li> </th>
					<th> زمان پاسخ دهی تیکت <i class="icon-time" style="vertical-align: -3px;font-size: 19px;margin-right: 2px;"></li> </th>
					<th> مدت زمان انتظار تیکت <i class="icon-time" style="vertical-align: -3px;font-size: 19px;margin-right: 2px;"></li> </th>
					<th>مشاهده پیام ها</th>
				</tr>
			</thead>
			<tbody>
					@foreach($answeredTickets as $answeredTicket)
					<tr>
						<td>
                            @if($answeredTicket->user_id != null)
                                {{ $answeredTicket->user_id }}
                            @else
                                {{ $answeredTicket->user_name }}
                            @endif
                        </td>

						<td>{{ $answeredTicket->ticket_title }}</a></td>
						<td> {{ $answeredTicket->sub_body . " ... " }} </td>
						<td class="time-ticket"> {{ verta($answeredTicket->created_at)->format('Y/n/j H:i') }}</td>
						<td class="time-ticket"> {{ verta($answeredTicket->answer->created_at)->format('Y/n/j H:i') }}</td>
						<td> {{ $answeredTicket->dif_time_answer }} از ثبت</td>
						<td class="btn-actions-controller">
							<a  href="{{ route('ticket.gust.show', $answeredTicket->id ) }}"><button class="btn btn-success btn-xs"><i class="icon-eye-open"></i></button></a>
						</td>
						

					</tr>
					
						@endforeach
						@else
						<div class="alert alert-danger">موردی برای نمایش وجود ندارد</div>
			</tbody>
		</table>
		{{ $answeredTickets->links() }}
	@endif
	</section>
@endsection
