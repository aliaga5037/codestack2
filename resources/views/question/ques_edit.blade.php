@extends('layouts.app')

@section('content')

<div class="col-md-10">
	<div class="row">
		<div class="col-md-12">
			<div class="content-box-large">
				<div class="panel-heading">
					<div class="panel-title">Suallar</div>
				</div>
				<div class="panel-body">
					<table class="table table-bordered">
						
					<thead>
						<tr>
							<th>{{$user->username}}</th>
							<th>Redaktə et</th>
							<th>Sil</th>
						</tr>
					</thead>
					<tbody>
						
							@foreach($questions as $question)
							<tr>
							<td> <span><a href="/{{$question->category->id}}/question/{{$question->id}}">{!!$question->ques_title!!}</a></span> </td>
							<td><a href="/{{$user->id}}/question/{{$question->id}}/edit" class="btn btn-primary">Redaktə et</a></td>
							<td>
							{{ Form::open(['method' => 'DELETE', 'url' => $user->id.'/question/'.$question->id]) }}
								{{ Form::submit('Sil', ['class' => 'btn btn-danger']) }}
								{{ Form::close() }}
							
							</td>
							</tr>
							@endforeach
						
					</tbody>
			</table>
		</div>
	</div>
</div>
</div>
</div>
@stop