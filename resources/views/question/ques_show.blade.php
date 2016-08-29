@extends('layouts.appnew')
@section('content')
      <section id="answerQuestion" class="container">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-11 col-lg-offset-1">
          <div class="">
            <div class="row " style="border-bottom:1px solid #eee">
              <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <div class="title col-xs-12 col-sm-12 col-md-12 col-lg-12" style="word-wrap:break-word;"">
                  <h4>
                  {!! $question->ques_title !!}
                  </h4>
                </div>
              </div>
              <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="profile pull-right">
                    <a href="#">
                      <img src="/uploads/avatar/{{ $question->user->avatar }}" alt="" class=""/>
                      <p class="text-muted"><span>@</span>{{$question->user_username}}</p>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-lg-12 col-md-12" style="word-wrap:break-word;">
                <p class="">
                  {!! $question->sual !!}
                </p>
              </div>
            </div>
            <div class="row categoryLine">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <a href="#" class="text-muted">
                  <p class="category text-muted">Kateqoriya:{{$question->category->cat_name}}</p>
                </a>
                <span class="text-muted">{{$question->created_at->diffForHumans()}}</span>
                <span class="fa fa-clock-o text-muted" aria-hidden="true"></span>
              </div>
            </div><hr>
              <div class="capiton" style="padding: 10px;">
                <ul class="list-group" id="cvb">
                  @foreach($question->answers as $answer)
                  
                  <li class="list-group-item" style="border:none;">
                    <label class="label  @if ($answer->user->role == 'muellim')
                      label-success
                      @elseif($answer->user->role == 'mentor')
                      label-primary
                      @elseif($answer->user->role == 'admin')
                      label-danger
                      @elseif($answer->user->role == 'user')
                      label-default
                      @endif"
                    style="font-size:15px;display: block;text-transform: uppercase;">Cavablayan:&nbsp{{$answer->user_username}}</label>
                    <span ><div >{!!$answer->cavab!!}</div></span>
                    <span class="pull-right">
                      @if (Auth::user()->id == $answer->user_id)
                      <div style="margin-top:-20px"></div>
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
                  {!!Form::submit('Cavabla',['class'=>'btn btn-primary','id'=>'cvbver','style'=>'margin-top: -11px;'])!!}
                </div>
                {{-- {!! Form::close() !!} --}}
              </div>
            <ul id="error_lists" class="list-group"></ul>
          </div>

        </div>

      </section>
      <div class="container">

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
      $('#cvb').append(' <li class="list-group-item" style="border:none;"><label class="label '+b+'" style="font-size:15px;display: block;text-transform: uppercase;">'+data.user.username+'s Answer:</label><span ><div >'+data.cvb.cavab+'</div></span><span class="pull-right"><div style="margin-top:-20px;"></div>'+a+'</span></li>')
      })
      .fail(function(data2) {
      var error=data2.responseJSON.cavab[0];
      if (error) {
      $('#error_lists').append(' <li class="list-group-item list-group-item-action list-group-item-danger">'+error+'</li>')
      }
      
      })
      CKEDITOR.instances.editor1.setData('');
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