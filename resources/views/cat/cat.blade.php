@extends('layouts.appnew')
@section('karandas')

@section('sual')
<a href="/{{$catName->id}}/question">
<span class="glyphicon glyphicon-edit" aria-hidden="true">
</a>
@stop
@section('content')
{{-- <div class="container">
    <div class="row">
        @foreach($ques as $question)
        <div class="col-md-10 col-md-offset-1">
            @if ($question->status == 'muellim')
            <div class="panel panel-success">
                @elseif($question->status == 'mentor')
                <div class="panel panel-primary">
                    @elseif($question->status == 'admin')
                    <div class="panel panel-danger">
                        @elseif($question->status == 'user')
                        <div class="panel panel-default">
                            @endif
                                <div class="panel-heading"><a href="/cat/{{$question->category->id}}" style="text-decoration:none;color:black;text-transform:uppercase;float:right">Kateqoriya:{{$question->category->cat_name}}</a><a href="/{{ $question->user_id }}/profile" style="text-decoration:none;color:black;font-size:16px;">Sualı Verən:<img src="/uploads/avatar/{{ $question->user->avatar }}" style="height: 50px;margin: 3px 10px 0 0px; border-radius:50%">{{$question->user_username}}</a></div>
                            
                            
                            <div class="panel-body">
                                <span>
                                <a href="/{{$question->category->id}}/question/{{$question->id}}">{!!$question->ques_title!!}</a>
                                </span>
                               
                            </div>
                            <div class="panel-footer"> {{$question->created_at->diffForHumans()}}</div> 
                        </div>
                    </div>
                    @endforeach
                    <div class="text-center">
                        {!!$ques->render()!!}
                    </div>
                </div>
            </div>
 --}}

              <section id="allQuestionsHome" class="container">
               <h3 class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2"
               style="line-height:46px;border-bottom:1px solid #eee;    margin-bottom: -13px;">Kateqoriya:{{$catName->cat_name}}</h3>
                <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                @foreach($ques as $question)
                 @if ($question->status == 'muellim')
                <div class="panel panel-default" style="border-left-color:lightgreen;">
                 @elseif($question->status == 'mentor')
                 <div class="panel panel-default" style="border-left-color:lightblue;">
                  @elseif($question->status == 'admin')
                   <div class="panel panel-default" style="border-left-color:red;">
                     @else
                      <div class="panel panel-default" >
                      @endif
                    <div class="panel-body">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 questionMiddle" style="word-wrap:break-word;">
                            <p>
                                <a  href="/{{$question->category->id}}/question/{{$question->id}}" style="color:gray">
                                {!!$question->ques_title!!}
                                </a>
                            </p>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 questionBottom">
                            <a  href="/{{$question->category->id}}/question/{{$question->id}}" class="share pull-left">
                                <span class="glyphicon glyphicon-share" aria-hidden="true"></span>
                            </a>
                            <a href="/cat/{{$question->category->id}}" class="category pull-left">
                                <span>Kateqoriya:{{$question->category->cat_name}}</span>
                            </a>
                            <a href="/{{ $question->user_id }}/profile" class="user pull-right">
                                <span><span>@</span>{{$question->user_username}}</span>
                                <img src="/uploads/avatar/{{ $question->user->avatar }}" alt="Photo"/>
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="time pull-right">
                                <span class="fa fa-clock-o pull-left" aria-hidden="true"></span>
                                <span> {{$question->created_at->diffForHumans()}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="text-center">
                    {!!$ques->render()!!}
                </div>
            </div>
        </section>
            @stop