
@extends('layouts.appnew')


@section('content')

{{-- <div class="col-md-offset-4 col-md-4">
    <table class="table">
        @foreach($questions as $key => $question)

            <tr>
                       
                <td><a href="{{$question->category_id}}/question/{{$question->id}}"><span>{!! $question->ques_title !!}</span></a></td>
                
            </tr>

        @endforeach
    </table>
</div> --}}
<section id="allQuestionsHome" class="container">
            <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                @foreach($questions as $question)
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
                    {!!$questions->render()!!}
                </div>
            </div>
        </section>

@stop