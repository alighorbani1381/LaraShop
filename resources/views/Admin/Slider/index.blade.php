@extends('layouts.Admin.dashbord')
@section('title') لیست اسلایدر ها @stop 
@section('content')
<style>
.pic{
	transition: 0.3s;
	border-radius:5px;
	height:80px;
}
.pic:hover{
transition: 0.3s;
margin-bottom: 12px;
border-radius: 6px;
box-shadow: 1px 1px 4px 0px #c6c6c6;
transform: rotate(5deg);
margin-top: 12px;
cursor: pointer;
	}
</style>
	<section class="panel">
                            <header class="panel-heading">
							   <span class="main-tubmnail">لیست اسلایدر ها</span>
							   <i class="icon-th-large main-tumbnail-icon" style="vertical-align:-6px;"></i>
                            </header>
                            <table class="table table-striped table-advance table-hover">
                                <thead>
                                    <tr>
										<th>عنوان</th>
                                        <th>لینک</th>
                                        <th>تصویر</th>
										<th>ویرایش</th>
										<th>حذف</th>
                                    </tr>
                                </thead>
                                <tbody>		
								@foreach ($sliders as $slider)
								<tr>
									<td>{{$slider->title}}</td>

									<td>
										<div class="btn-actions-controller"> 
											<a href="{{$slider->link}}">
												<button style="background:#19b6bd; border:none;" title="{{$slider->link}}" data-placement="top" data-toggle="tooltip" class="btn btn-success tooltips" type="button" data-original-title="Tooltip on top">
													<i class="icon-link"></i>	
												</button>
											</a>
										</div>
									</td>

								<td><img class="pic" src="{{ asset($slider->picture) }}" alt="Picture"></td>

								<td>
									<div class="btn-actions-controller"> 
										<a  href="{{  route('slider.edit', $slider->id ) }}">
											<button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
										</a>
									</div>
								</td>

								<td>
									<div class="btn-actions-controller"> 
										<form  action="{{ route('slider.destroy', $slider->id ) }}" method="post" style="display:inline;">
											{{ method_field('DELETE') }}
											{{ csrf_field() }}
											<button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button>
										</form>
									</div>
								</td>

								</tr>
								@endforeach
											
                                </tbody>
                            </table>
							{{ $sliders->links() }}
						</section>
@endsection
