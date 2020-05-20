@extends('layouts.appwide')

@section('title')
سوالات متداول
@endsection

@section('content')

   <!-- FAQ Part Start-->
   <div id="content" class="col-sm-12">
    <h1 class="title custom-title-page">راهنما و سوالات متداول</h1>
    <hr>
    @foreach($ًquesionsCategories as $key =>$ًquesionsCategory)
    <div class="row">
      <div class="col-sm-3">
      <h3>{{ $ًquesionsCategory->question_text }}</h3>
      </div>
      <div class="col-sm-9">
        <div class="faq{{ $key }}">

            @if($ًquesionsCategory->sub_question->count() != 0)
                @foreach($ًquesionsCategory->sub_question as $question)
                        <div> <a href="#faq{{ $key }}" data-parent="#accordion" data-toggle="collapse" class="panel-title">{{ $question->question_text }}<i class="fa fa-caret-down" style="margin-right: 6px;"></i></a>
                        <div id="faq{{ $key }}" class="panel-collapse collapse">
                            <div class="panel-body">{{ $question->answer }}</div>
                        </div>
                    </div>
                @endforeach
            @endif          

        </div>

      </div>
    </div>
    <hr>
    @endforeach
  </div>
  <!-- FAQ Part End -->
@endsection