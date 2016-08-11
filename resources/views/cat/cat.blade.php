@extends('layouts.app')
@section('sual')
<div class="col-md-1">
    <a href="/{{$catName->id}}/question" class="btn btn-primary" style="margin-top: 8px;">Sual ver</a>
</div>
@stop
@section('content')
<div class="container">
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
                           <div class="panel-heading"><a href="/cat/{{$question->category->id}}" style="text-decoration:none;color:black;text-transform:uppercase;float:right">Category:{{$question->category->cat_name}}</a><a href="/{{ $question->user_id }}/profile" style="text-decoration:none;color:black;font-size:16px;">Owner:{{$question->user_username}}</a></div>
                            
                            
                            <div class="panel-body">
                                <span>
                                <a href="/{{$question->category->id}}/question/{{$question->id}}">{!!$question->ques_title!!}</a>
                                </span>
                               
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="text-center">
                        {!!$ques->render()!!}
                    </div>
                </div>
            </div>
            @stop