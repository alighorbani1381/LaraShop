@extends('layouts.Admin.dashbord')
@section('title')لیست فیلتر ها @stop 
@section('content')
<div class="col-lg-8 col-lg-offset-2">
	<ul class="breadcrumb">
		<li><a href="dashbord"><i class="icon-home"></i>داشبورد</a></li>
		<li><a href="{{ route('filter.index') }}">فیلتر ها</a></li>
		<li class="active">لیست فیلتر ها</li>
</ul>
	<section class="panel">
				<header class="panel-heading">
					فیلتر ها (بر اساس دسته بندی )
				</header>

			
			<div class="accordion" id="accordion">
				@foreach($categories as $category)
				<?php $parentFilters=\App\Filter::where([['category_id',$category->id],['parent_id',0]])->orderBy('persian_name')->get(); ?>
		
				
					
					 @if($parentFilters->count() != 0)
							<div class="card">
						
								<div class="card-header" id="heading{{ $category->id }}">
									<h5 class="mb-0">
									<button class="btn btn-filter collapsed" data-toggle="collapse" data-target="#collapse{{ $category->id }}" aria-expanded="false" aria-controls="collapse{{ $category->id }}">
										<strong>
											{{ $category->title }}
										</strong>
									</button>
									</h5>
								</div>

								<div id="collapse{{ $category->id }}" class="collapse" aria-labelledby="heading{{ $category->id }}" data-parent="#accordion">
									<div class="card-body">
										<ul class="list-group">
											@foreach ($parentFilters as $parentFilter)
											<?php $subFilters=\App\Filter::where('parent_id',$parentFilter->id)->orderBy('persian_name')->get();?>
										<li class="list-group-item active">
											<b>
												{{ $parentFilter->persian_name }}
												:
											</b>
											<div class="actions-group">
												<a  class="btn btn-primary btn-xs" href="{{ route('filter.edit', $parentFilter->id ) }}"><i class="icon-pencil"></i></a>
												<form  action="{{ route('filter.destroy', $parentFilter->id ) }}" method="post" style="display:inline;">
													@csrf
													@method('DELETE')
													<button class="btn btn-danger btn-xs" title="حذف همه">
														<i class="icon-trash "></i>
													</button>
												</form>
											</div>
										</li>
												@if($subFilters->count() != 0)
													@foreach($subFilters as $subFilter)
														<li class="list-group-item">{{ $subFilter->persian_name  }} 
															

														<div class="actions-group">
															<a  class="btn btn-primary btn-xs" href="{{ route('filter.edit', $subFilter->id ) }}"><i class="icon-pencil"></i></a>

															
															<form  action="{{ route('filter.destroy', $subFilter->id ) }}" method="post" style="display:inline;">
																@csrf
																@method('DELETE')
																<button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button>
															</form>
														</div>

														</li>
													@endforeach
												@else
												<div class="alert alert-warning" role="alert">
													<strong>هشدار: </strong>
													زیر فیلتری وجود ندارد
												</div>
												@endif
											@endforeach {{--  Create parentFilter & It's subFilter --}}
											
											
										</ul>
										<br>
									</div>
								</div>

							</div>
						@endif
						
						@endforeach {{--  Create Category --}}

			</div>
			<br>
	</section>				
</div>	
<style>




</style>
@endsection

