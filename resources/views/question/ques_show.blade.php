@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">


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
    <div class="panel-heading">
        <a href="/cat/{{$question->category->id}}" style="text-decoration:none;color:#a94442;">{{$question->category->cat_name}}/{{$question->user_username}}</a>
    </div>


    <div class="panel-body">

  
        {!! $question->sual !!}
   
    
    </div>
    
    <div class="capiton" style="padding: 10px;">
        @foreach($question->answers as $answer)
            <span>{{$answer->user_username}}</span><br>
            <span>{!!$answer->cavab!!}</span>
            <span class="pull-right">
                @if (Auth::user()->id == $answer->user_id)
                {{ Form::open(['method' => 'DELETE', 'url' => Auth::user()->id.'/answer/'.$answer->id]) }}
                {{ Form::submit('Delete', ['class' => 'btn-xs btn-danger']) }}
                {{ Form::close() }}
            @endif
            </span>
            <hr>
            @endforeach
            <a href="/{{$question->id}}/answer" class="btn btn-default">Cavabla</a>
            </div>
            </div>
            </div>
    </div>
</div>


@stop