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
                            <ul class="list-group" id="cvb">
                                @foreach($question->answers as $answer)
                                
                                <li class="list-group-item">
                                <label class="label  @if ($answer->user->role == 'muellim')
            label-success
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
                                    <div style="margin-top:-25px"></div>
                                    {{ Form::submit('Delete', ['class' => 'btn-xs btn-danger dlt' ,'data' => $answer->id]) }}

                                    @endif
                                </span>
                                </li>
                                @endforeach
                            </ul>
                    {{-- {!! Form::open(['url' => "/$question->id/answer"]) !!} --}}
                    
                    <div class="form-group">
                        {!!Form::text('editor1',null,['class'=>'form-control' , 'id'=>'editor1'])!!}
                        {!!Form::hidden('cavab',null,['id'=>'cavab'])!!}
                    </div>
                    <div class="form-group">
                        {!!Form::submit('Cavabla',['class'=>'btn btn-primary','id'=>'cvbver'])!!}
                    </div>
                    {{-- {!! Form::close() !!} --}}
                </div>
                <ul id="error_lists" class="list-group"></ul>

            </div>
        </div>
    </div>
@section('ck')
<script>
editor.on( 'change', function( evt ) {
$('#cavab').val(evt.editor.getData())
});

jQuery(document).ready(function($) {





    $('#cvbver').click(function() {

        var postques=$('#cavab').val();

         $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':'{{ csrf_token() }}'
            } 
        })
                $.ajax({
                url: '/{{$question->id}}/answeraddwithajax',
                type: 'POST',
                dataType: 'json',
                data: {cavab:postques},
            })
            .done(function(data) {
                if ({{ Auth::user()->id}} == data.user.id) {
                    a = "<input type='submit' class='btn-xs btn-danger dlt' data="+data.cvb.id+" value='Delete'>"
                }else{a = ''}
                if (data.user.role == "admin") {
                   b = "label-danger"
                }else if(data.user.role == "muellim"){b = "label-success"}
                else if(data.user.role == "mentor"){b = "label-primary"}
                    else{b = "label-default"}
                $('#cvb').append(' <li class="list-group-item"><label class="label '+b+'" style="font-size:15px;display: block;text-transform: uppercase;">'+data.user.username+'s Answer:</label><span ><div >'+data.cvb.cavab+'</div></span><span class="pull-right"><div style="margin-top:-25px;"></div>'+a+'</span></li>')

            })
            .fail(function(data2) {
                 var error=data2.responseJSON.cavab[0];
                  if (error) {
                     $('#error_lists').append(' <li class="list-group-item list-group-item-action list-group-item-danger">'+error+'</li>')
                  }
                

            })

    });


        $( "body" ).on( "click", ".dlt",function (argument) {
        var id=$(this).attr('data')
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':'{{ csrf_token() }}'
            }
        })
        
        $.ajax({
            url: "/{{Auth::user()->id}}/answerdeletewithajax/"+id+"",
            type: 'GET',
            dataType: 'text',
            data: {param1: 'value1'},
        })

        $(this).parent().parent().remove()
        
    })

});
</script>
            </div>
            </div>
            </div>
    </div>
</div>
@stop
@stop