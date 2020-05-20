@extends('layouts.Admin.dashbord')
@section('title')فیلتر محصولات @stop 
@section('content')
<div class="accordion" id="accordion">

 
          @if($parentFilters->count() != 0)
                <div class="card">
            
                    <div class="card-header" id="heading{{ $product->id }}">
                        <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $product->id }}" aria-expanded="false" aria-controls="collapse{{ $product->id }}">
                            <strong>
                                {{ $product->name }}
                            </strong>
                        </button>
                        </h5>
                    </div>

                    <div id="collapse{{ $product->id }}" class="collapse" aria-labelledby="heading{{ $product->id }}" data-parent="#accordion">
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach ($parentFilters as $parentFilter)
                                
                            <li class="list-group-item active" style="background-color: #ce940a;border-color: #ce940a;">
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
                                    @if($parentFilter->sub_filters->count() != 0)
                                        @foreach($parentFilter->sub_filters as $subFilter)
                                    @php
                                    $filterValue=\App\ProductFilter::where('filter_id', $subFilter->id)->where('product_id' ,$product->id)->first();
                                    @endphp
                                        @if($filterValue != null && $filterValue->count() != 0)
                                    
                                                <li class="list-group-item">
                                                    {{ $subFilter->persian_name  }} :
                                                    
                                                    <div class="actions-group" style="left:70%;">

                                                        @if($subFilter->type == '0')
                                                            {{ $filterValue->value  }}
                                                        @else
                                                                @if($filterValue->value == '1')
                                                                ندارد
                                                                {{-- <i class="icon-ok"> --}}
                                                                @else
                                                                    دارد
                                                                    {{-- <i class="icon-remove-sign">  --}}
                                                                @endif
                                                                    
                                                        @endif
                                                    </div>

                                                <div class="actions-group">
                                                    <a  class="btn btn-primary btn-xs" href="{{ route('product-filter.edit', $filterValue->id ) }}"><i class="icon-pencil"></i></a>
                                                    <form  action="{{ route('product-filter.destroy', $subFilter->id ) }}" method="post" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button>
                                                    </form>
                                                </div>

                                                </li>
                                                @endif 
                                        @endforeach
                                    @else
                                    <div class="alert alert-warning" role="alert">
                                        <strong>هشدار: </strong>
                                        زیر فیلتری وجود ندارد
                                    </div>
                                    @endif
                                @endforeach 
                                
                                
                            </ul>
                            <br>
                        </div>
                    </div>

                </div>
            @endif
        

</div>
@endsection