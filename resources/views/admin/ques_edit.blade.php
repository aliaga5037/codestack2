@extends('layouts.admin')
@section('not')
<li><a href="{{ url('/admin/notify') }}"><i class="fa fa-btn "></i>Notifications
    @if (count($result) != 0)
    <span class="pull-right" style="background: red; padding: 2px;color:white;">
        {{count($result)}}
    </span>
    @endif
</a></li>
@stop
@section('content')
<div class="page-content">
    <div class="row">
        <div class="col-md-2">
            <div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li><a href="/adminPage"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                    <li class="current"><a href="/admin/tables"><i class="glyphicon glyphicon-list"></i> Tables</a></li>
                    <li><a href="/admin/ques"><i class="glyphicon glyphicon-list"></i> Questions</a></li>
                    <li><a href="/admin/cats"><i class="glyphicon glyphicon-list"></i> Categories</a></li>
                    <li><a href="/admin/notify"><i class="glyphicon glyphicon-list"></i>Notifications</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Sual Dəyiş</div>
                <div class="panel-body">
                    {!! Form::open(['url' => "/user/".$user->id."/question/".$ques->id , 'method' => 'PATCH']) !!}
                    
                    <div class="form-group">
                         <textarea  id="editor1" cols="30" rows="10">{!! $ques->sual !!}</textarea>
                        {!!Form::hidden('sual',$ques->sual,['id'=>'sual'])!!}
                    </div>
                    <div class="form-group">
                        {!!Form::submit('Click Me!',['class'=>'btn btn-primary'])!!}
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