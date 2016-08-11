@extends('layouts.app')
@section('content'){{-- 
@if (count($errors) > 0)
    {{ dd($errors) }}
@endif --}}
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Sual Ver</div>
                <div class="panel-body">
                    {!! Form::open(['url' => $category->id."/question"]) !!}
                    
                    <div class="form-group">
                    {!!Form::label('quest_title', 'Your questions title:', array('class' => 'label label-primary ' ));!!}
                        {!!Form::text('quest_title',null,['class'=>'form-control' , 'id'=>'ques_title'])!!}    
                        {!!Form::label('editor1', 'Your questions:', array('class' => 'label label-info'));!!}                   
                        {!!Form::text('editor1',null,['class'=>'form-control' , 'id'=>'editor1'])!!}
                        {!!Form::hidden('sual',null,['id'=>'sual'])!!}
                    </div>
                    <div class="form-group">
                        {!!Form::submit('Sual ver!',['class'=>'btn btn-primary'])!!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@section('ck')

    <script>
editor.on( 'change', function( evt ) {
    $('#sual').val(evt.editor.getData())
});
editor.config.height = 100;  
</script>
@stop
<div class="container">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
@stop