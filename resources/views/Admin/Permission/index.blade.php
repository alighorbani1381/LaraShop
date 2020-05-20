@extends('layouts.Admin.dashbord')
@section('title')  لیست دسترسی ها  @stop 
@section('content')
	<section class="panel">
                            <header class="panel-heading">
                                لیست دسترسی ها
                            </header>
                            <table class="table table-striped table-advance table-hover">
                                <thead>
                                    <tr>
										<th><i class="icon-bullhorn"></i>نام دسترسی</th>
                                        <th><i class="icon-bullhorn"></i>عنوان دسترسی</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
									
										@foreach($permissions as $permission)
										
										<tr>
											<td>{{ $permission->name }} </td>
											<td> {{ $permission->title }} </td>
											<td>
												<a  href="{{  route('permission.edit', $permission->id ) }}"><button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button></a>
												
												
												<form  action="{{ route('permission.destroy', $permission->id ) }}" method="post" style="display:inline;">
													{{ method_field('DELETE') }}
													{{ csrf_field() }}
													<button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button>
												</form>
											</td>
										</tr>
										
											@endforeach
											
                                </tbody>
                            </table>
							{{ $permissions->links() }}
                        </section>
						
@endsection