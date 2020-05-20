@extends('layouts.Admin.dashbord')
@section('title')لیست سوالات @stop 
@section('content')
<div class="col-lg-8 col-lg-offset-2">
	<ul class="breadcrumb">
		<li><a href="dashbord"><i class="icon-home"></i>داشبورد</a></li>
		<li><a href="{{ route('question.index') }}">سوالات</a></li>
		<li class="active">لیست سوالات</li>
</ul>
	<section class="panel">
				<header class="panel-heading">
					سوالات (بر اساس دسته بندی )
				</header>

			
			<div class="accordion" id="accordion">
				@foreach($ًquesionsCategories as $ًquesionsCategories)
		
				
					
					 @if($ًquesionsCategories->count() != 0)
							<div class="card">
						
								<div class="card-header" id="heading{{ $ًquesionsCategories->id }}">
									<h5 class="mb-0">
									<button class="btn btn-filter collapsed" data-toggle="collapse" data-target="#collapse{{ $ًquesionsCategories->id }}" aria-expanded="false" aria-controls="collapse{{ $ًquesionsCategories->id }}">
										<strong>
											{{ $ًquesionsCategories->question_text }}
										</strong>
									</button>
									</h5>
								</div>

								<div id="collapse{{ $ًquesionsCategories->id }}" class="collapse" aria-labelledby="heading{{ $ًquesionsCategories->id }}" data-parent="#accordion">
									<div class="card-body">
										<ul class="list-group">
											@foreach ($ًquesionsCategories->sub_question as $question)
											
										<li class="list-group-item active" style="background: linear-gradient(15deg,#260b6f,#2f0f86); border-color: #260b6f;">
											<b>
												{{ $question->question_text }}
											</b>
											<div class="actions-group">
												<a  class="btn btn-primary btn-xs" href="{{ route('question.edit', $question->id ) }}"><i class="icon-pencil"></i></a>
												<form  action="{{ route('question.destroy', $question->id ) }}" method="post" style="display:inline;">
													@csrf
													@method('DELETE')
													<button class="btn btn-danger btn-xs" title="حذف همه">
														<i class="icon-trash "></i>
													</button>
												</form>
											</div>
										</li>
												
													
														<li class="list-group-item" style="line-height:28px;">{{ $question->answer  }} 
															

														<div class="actions-group">
															<a  class="btn btn-primary btn-xs" href="{{ route('question.edit', $question->id ) }}"><i class="icon-pencil"></i></a>

															
															<form  action="{{ route('question.destroy', $question->id ) }}" method="post" style="display:inline;">
																@csrf
																@method('DELETE')
																<button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button>
															</form>
														</div>

														</li>
						
											@endforeach 
											
											
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

