@extends('layouts.Admin.dashbord')
@section('title') اضافه کردن نقش @stop 
@section('content')
	<section class="panel">
                            <header class="panel-heading">
                                لیست سطوح دسترسی
                            </header>
                            <table class="table table-striped table-advance table-hover">
                                <thead>
                                    <tr>
										<th><i class="icon-bullhorn"></i>نام سطح دسترسی</th>
                                        <th><i class="icon-bullhorn"></i>عنوان سطح دسترسی</th>
										<th>عملیات</th>
										<th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
									
										@foreach($roles as $role)
										
										<tr>
											<td>{{ $role->name }} </td>
											<td> {{ $role->title }} </td>
											<td>
												<a  href="{{  route('role.edit', $role->id ) }}"><button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button></a>
												
												
												<form  action="{{ route('role.destroy', $role->id ) }}" method="post" style="display:inline;">
													{{ method_field('DELETE') }}
													{{ csrf_field() }}
													<button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button>
												</form>
											</td>

											<td>
												<section class="sectionf">
													<span class="trash">
														<span></span>
														<i></i>
													</span>
												</section>
											</td>
										</tr>
										
											@endforeach
											
                                </tbody>
                            </table>
							{{ $roles->links() }}
						</section>

						
						
	<style>

.sectionf {
	/* background: #dce7eb; */
	width: 100%;
	height: 100%;
	display: flex;
	align-items: center;
}


.trash {
	background:#ff6873;
	width: 15px;
	height: 15px;
	display: inline-block;
	margin:0 auto;
	
	position: relative;
	-webkit-border-bottom-right-radius: 6px;
	-webkit-border-bottom-left-radius: 6px;
	-moz-border-radius-bottomright: 6px;
	-moz-border-radius-bottomleft: 6px;
	border-bottom-right-radius: 6px;
	border-bottom-left-radius: 6px;
}

.trash span {
	position: absolute;
	height: 9px;
	background: #ff6873;
	top: -12px;
	left: -5px;
	right: -6px;
	border-top-left-radius: 10px;
	border-top-right-radius: 10px;
	transform: rotate(0deg);
	transition: transform 250ms;
	transform-origin: 19% 100%;
	width: 25px;
}

/* Small thing*/
.trash span:after {
	content: '';
	position: absolute;
	width: 14px;
	height: 8px;
	background: #ff6873;
	top: -11px;
	border-top-left-radius: 10px;
	border-top-right-radius: 10px;
	transform: rotate(0deg);
	transition: transform 250ms;
	transform-origin: 19% 100%;
	left: 6px;
}


.trash i {
	position: relative;
	width: 2px;
	height: 8px;
	background: black;
	display: block;
	margin: 4px auto;
	border-radius: 10px;
}
.trash i:after {
	content: '';
	width: 3px;
	height: 10px;
	background:black;
	position: absolute;
	left: -10px;
	border-radius: 5px;
}
.trash i:before {
	content: '';
	width: 3px;
	height: 10px;
	background:black;
	position: absolute;
	right: -10px;
	border-radius: 5px;
}

.trash:hover span {
	transform: rotate(-45deg);
	transition: transform 250ms;
}			
	</style>
@endsection
