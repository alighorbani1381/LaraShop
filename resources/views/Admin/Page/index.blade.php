@extends('layouts.Admin.dashbord')
@section('title')لیست برگه ها @stop 
@section('content')

<div class="col-lg-12">
	<ul class="breadcrumb">
		<li><a href="dashbord"><i class="icon-dashboard"></i>  داشبورد  </a></li>
		<li><a href="{{ route('page.index') }}">برگه ها</a></li>
		<li class="active"> لیست برگه ها</li>
	</ul>
	<section class="panel">
                            <header class="panel-heading">
								<span class="main-tubmnail">لیست برگه ها</span>
								<i class="icon-file-alt main-tumbnail-icon" style="vertical-align: -5px;"></i>
								<form class="search-custom" style="display:none;">
									<input type="text" class="form-control search search-custom" name="search" placeholder="نام برگه را وارد کنید ..." >
								</form>

                            </header>
                            <table class="table table-striped table-advance table-hover">
								@if($pages->count()!=0) 
                                <thead>
                                    <tr>
										<th>ردیف</th>
										<th>نام برگه</th>
										<th>نام انگلیسی برگه</th>
										<th>شرح برگه (نویسنده)</th>
										<th>تاریخ ایجاد</th>
										<th>وضعیت انتشار</th>
										<th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>

								
										@foreach($pages as $key => $page)
											<tr>
												<td>{{ $key + 1}}</td>
												<td>{{ $page->title }} </td>
												<td>{{ $page->english_name }} </td>
												<td> {{ $page->description }} </td>
												<td class="jalali-d">
													{{ $page->jalali_date_time }}
												</td>
												<td>
													@switch($page->shared)
														@case('draft')
															<span type="button" class="btn btn-round btn-warning">پیش نویس</span>
															@break
														@case('disable')
															<span type="button" class="btn btn-round btn-danger">منتشر نشده</span>
															@break

														@default
															<span type="button" class="btn btn-round btn-success">منتشر شده</span>
															@break
													@endswitch
														
												</td>

												

												<td>
													<div class="btn-actions-controller">
														<a  href="{{  route ('page.show',$page->english_name ) }}"><button class="btn btn-success btn-xs"><i class="icon-eye-open"></i></button></a>
														<a  href="{{  route ('page.edit',$page->english_name ) }}"><button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button></a>
														<form  action="{{ route('page.destroy', $page->english_name ) }}" method="post" style="display:inline;">
															@csrf
															@method('DELETE')
															<button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button>
														</form>
													</div>
												</td>

											</tr>
										
										@endforeach
								 @else
								 <div class="alert alert-danger">موردی برای نمایش وجود ندارد </div>
								 @endif
											
                                </tbody>
                            </table>
							{{ $pages->links() }}
						</section>
</div>
					
@endsection
