@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Sual Dəyiş</div>
                <div class="panel-body">
                @if (count($errors) > 0)
                    <ul class="list-group">
                        @foreach ($errors->all() as $error)
                        <li class="list-group-item list-group-item-action list-group-item-danger">{{ $error }}</li>
                        @endforeach
                    </ul>

                @endif
                    {!! Form::open(['url' => $id."/question/".$ques->id , 'method' => 'PATCH']) !!}
                    
                    <div class="form-group">
                    {!!Form::label('quest_title', 'Your questions title:', array('class' => 'label label-primary ' ));!!}
                        {!!Form::text('quest_title',$ques->ques_title,['class'=>'form-control' , 'id'=>'ques_title'])!!}
                        <textarea  id="editor1" cols="30" rows="10">{!! $ques->sual !!}</textarea>
                        {!!Form::hidden('sual',$ques->sual,['id'=>'sual'])!!}
                    </div>
                    <div class="form-group">
                        {!!Form::submit('Dəyiş',['class'=>'btn btn-primary'])!!}
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
</script>
@stop

@stop