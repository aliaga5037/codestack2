@extends('layouts.app')
@section('content')

    
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Sual Ver</div>
                <div class="panel-body">
                    {!! Form::open(['url' => $category->id."/question"]) !!}
                    
                    <div class="form-group">
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
    console.log($('#sual').val())
});
config.readOnly = true;    
</script>
@stop



@stop