@extends('layouts.app')
@section('content')
<script src="/vendors/ckeditor/ckeditor.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Cavab Ver</div>
                <div class="panel-body">
                    <p>{!!$ques->sual!!}</p>
                    {!! Form::open(['url' => "/$ques->id/answer"]) !!}
                    
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
</div>
@section('ck')
<script>
editor.on( 'change', function( evt ) {
$('#cavab').val(evt.editor.getData())
});
</script>
@stop
@stop