@extends('layouts.Admin.dashbord')
@section('title') لیست کاربران @stop 
@section('content')
@push('CustomScript')
<script src="{{ asset('PubAdmin/js/AlertPlugin/sweetalert.js') }}"></script>
@endpush
<div class="col-lg-8 col-lg-offset-2">
	<ul class="breadcrumb">
		<li><a href="dashbord"><i class="icon-dashboard"></i>  داشبورد  </a></li>
		<li><a href="{{ route('user.index') }}">مدیریت کاربران</a></li>
		<li class="active">لیست کاربران</li>
	</ul>
	<section class="panel">
                            <header class="panel-heading">
                                لیست کاربران (مدیران وب سایت)
                            </header>
                            <table class="table table-striped table-advance table-hover">
                                <thead>
                                    <tr>
										<th>نام کاربر</th>
                                        <th>ایمیل کاربر</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
									
										@foreach($users as $user)
										
										<tr>
											<td>{{ $user->name }} </td>
											<td> {{ $user->email }} </td>
											<td>
												<a  href="{{  route('user.edit', $user->id ) }}"><button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button></a>
												
												
												<form  action="{{ route('user.destroy', $user->id ) }}" method="post" style="display:inline;">
													@csrf
													@method('DELETE')
													<button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button>
												</form>
											</td>
										</tr>
										
											@endforeach
											
                                </tbody>
                            </table>
							{{ $users->links() }}
						</section>
					</div>

					@if(session()->has('sendMail'))
						<script>
							$(document).ready(function(){
								Swal.fire({
									icon: 'success',
									title: 'ایمیل ارسال شد 🧐',
									text: 'بعد از تایید ایمیل شدن ایمیل کاربر میتواند از امکانات سایت استفاده کند',
									confirmButtonText: 'باشه مرسی',
								});
							});
						</script>
					 @endif

					 @if(session()->has('registerEmail'))
							<script>$(document).ready(function(){Swal.fire({icon: 'success',title: 'موفقیت آمیز 😎',text: 'کاربر شما بدون ثبت ایمیل ثبت نام شد',confirmButtonText: 'مرسی',});});	</script>							
					 @endif
@endsection