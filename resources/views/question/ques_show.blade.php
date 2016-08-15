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
                            <div class="panel-heading"><a href="/cat/{{$question->category->id}}" style="text-decoration:none;color:black;text-transform:uppercase;float:right;margin-top:17px;">Kateqoriya:{{$question->category->cat_name}}</a><a href="/{{ $question->user_id }}/profile" style="text-decoration:none;color:black;font-size:16px;">Sualı Verən:<img src="/uploads/avatar/{{ $question->user->avatar }}" style="height: 50px;margin: 3px 10px 0 0px; border-radius:50%">{{$question->user_username}}</a></div>

    <div class="panel-body">

  
        {!! $question->sual !!}
   
    
    </div>
    
    <div class="capiton" style="padding: 10px;">
                            <ul class="list-group">
                                @foreach($question->answers as $answer)
                                
                                <li class="list-group-item">
                                <label class="label  @if ($answer->user->role == 'muellim')
            label-info
                @elseif($answer->user->role == 'mentor')
                label-primary
                    @elseif($answer->user->role == 'admin')
                    label-danger
                        @elseif($answer->user->role == 'user')
                        label-default
                            @endif"

                                 style="font-size:15px;display: block;text-transform: uppercase;">{{$answer->user_username}}s Answer:</label>
                                    <span ><div >{!!$answer->cavab!!}</div></span>
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
                    {!! Form::open(['url' => "/$question->id/answer"]) !!}
                    
                    <div class="form-group">
                        {!!Form::text('editor1',null,['class'=>'form-control' , 'id'=>'editor1'])!!}
                        {!!Form::hidden('cavab',null,['id'=>'cavab'])!!}
                    </div>
                    <div class="form-group">
                        {!!Form::submit('Cavabla',['class'=>'btn btn-primary'])!!}
                    </div>
                    {!! Form::close() !!}
                </div>
                @if (count($errors) > 0)
                <ul class="list-group">
                    @foreach ($errors->all() as $error)
                    <li class="list-group-item list-group-item-action list-group-item-danger">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </div>
@section('ck')
<script>
editor.on( 'change', function( evt ) {
$('#cavab').val(evt.editor.getData())
});
</script>
            </div>
            </div>
            </div>
    </div>
</div>
@stop
@stop