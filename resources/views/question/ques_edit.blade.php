@extends('layouts.appnew')

@section('content')


 <section id="myQuestions" class="container">
 <h3 class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">My Questions</h3>
 	@foreach($questions as $question)
      <div class="panel panel-default col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
        <p class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <a href="/{{$question->category->id}}/question/{{$question->id}}"> {!!$question->ques_title!!}</a>
        </p>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 settings">
          <a href="#" class="category">
             {{$question->category->cat_name}}
          </a>
          <a href="#">
            <h6>
            <i class="fa fa-clock-o" aria-hidden="true"></i>
            {{$question->created_at->diffForHumans()}}
            </h6>
          </a>
          <a href="#">
            <span class="glyphicon glyphicon-share" aria-hidden="true"></span>
          </a>
          <a href="#">
            <span class="glyphicon glyphicon-trash pr_ques_delete" aria-hidden="true"></span>
          </a>
          <a href="/{{$user->id}}/question/{{$question->id}}/edit">
            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
          </a>
        </div>
      </div>
@endforeach
    </section>









<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('.pr_ques_delete').click(function(event) {
			 var id=$(this).attr('data')
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':'{{ csrf_token() }}'
            }
        })
        
        $.ajax({
            url: "/{{Auth::user()->id}}/quesdeletewithajax/"+id+"",
            type: 'GET',
            dataType: 'text',
            data: {param1: 'value1'},
        })

        $(this).parent().parent().parent().remove()
		});
	});
</script>
@stop