@extends('layouts.app')
@section('content')
{{-- <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Ana sehife</div>
                <div class="panel-body">
                    Siz uğurlu giriş etdiniz!
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="container">
    <div class="row">
    <div class="col-md-10 col-md-offset-1">
    <h1 style="line-height:9px;font-size:22px;color:#242729;">All Questions</h1><hr>
    </div>
        @foreach($ques as $question)
        
        <div class="col-md-10 col-md-offset-1">
            @if ($question->status == 'muellim')
            <div class="panel panel-success">
                @elseif($question->status == 'mentor')
                <div class="panel panel-primary">
                    @elseif($question->status == 'admin')
                    <div class="panel panel-success">
                        @elseif($question->status == 'user')
                        <div class="panel panel-default">
                            @endif
                            <div class="panel-heading"><a href="/cat/{{$question->category->id}}" style="text-decoration:none;color:black;text-transform:uppercase;float:right">Category:{{$question->category->cat_name}}</a><a href="/{{ $question->user_id }}/profile" style="text-decoration:none;color:black;font-size:16px;">Owner:{{$question->user_username}}</a></div>
                            
                            
                            <div class="panel-body">
                                 <span><a style="color:black" href="/{{$question->category->id}}/question/{{$question->id}}">  
                                    {!!$question->ques_title!!}
                                </a>
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



            @endsection