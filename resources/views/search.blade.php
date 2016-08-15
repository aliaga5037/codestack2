
@extends('layouts.app')


@section('content')

<div class="col-md-offset-4 col-md-4">
    <table class="table">
        @foreach($questions as $key => $question)

            <tr>
                       
                <td><a href="{{$question->category_id}}/question/{{$question->id}}"><span>{!! $question->ques_title !!}</span></a></td>
                
            </tr>

        @endforeach
    </table>
</div>

@stop