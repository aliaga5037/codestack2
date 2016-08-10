@extends('layouts.app')
@section('head')
<style>
form{

    clear: both;
}
.btn-file {
    position: relative;
    overflow: hidden;
    top: 34px;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
</style>
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $user->name }}in Profili</div>
                <div class="panel-body">
                    <div>
                        <img src="/uploads/avatar/{{$user->avatar}}" alt="" style="height: 300px;width: 300px;float: left;border-radius:50%;">
                    </div>
                    
                    <div>{{ $user->name }}&nbsp{{ $user->surname }}</div>
                    
                    <div>{{ $user->email }}</div>

                    <div><a href="/{{ $user->id }}/questions">{{ $user->username }}in Sualları</a></div>

                   {{--  <div>
                        <a href="{{Auth::user()->id}}/myQuestions">suallar</a>
                    </div> --}}
    </div>
</div>
</div>
</div>
</div>

@stop