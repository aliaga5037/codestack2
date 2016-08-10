
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
						</tr>
					</thead>
					<tbody>
						
							@foreach($questions as $question)
							<tr>
							<td> <span><a href="/{{$question->category->id}}/question/{{$question->id}}">{!!$question->ques_title!!}</a></span> </td>
							@endforeach
						
					</tbody>
			</table>
		</div>
	</div>
</div>
</div>
</div>
@stop