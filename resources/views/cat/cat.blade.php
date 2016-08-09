@extends('layouts.app')
@section('sual')
<div class="col-md-2">
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
                            <div class="panel-heading">{{$catName->cat_name}}/{{$question->user_username}}</div>
                            
                            
                            <div class="panel-body">
                                <span>
                                <a href="/{{$question->category->id}}/question/{{$question->id}}">{!!$question->ques_title!!}</a>
                                </span>
                               
                            </div>
                            <div class="capiton" style="padding: 10px;">
                <ul class="list-group">
                                @foreach($question->answers as $answer)
                                <li class="list-group-item">
                                <label class="label label-info" style="font-size:15px;float:left;text-transform: uppercase;">{{$answer->user_username}}s Answer:</label>
                                    <span ><div style="margin-left:140px;">{!!$answer->cavab!!}</div></span>
                                <span class="pull-right">
                                    @if (Auth::user()->id == $answer->user_id)
                                    <div style="margin-top:-25px">{{ Form::open(['method' => 'DELETE', 'url' => Auth::user()->id.'/answer/'.$answer->id]) }}</div>
                                    
                                    {{ Form::submit('Delete', ['class' => 'btn-xs btn-danger']) }}
                                    {{ Form::close() }}
                                    @endif
                                </span>
                                </li>
                                @endforeach
                            </ul>
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