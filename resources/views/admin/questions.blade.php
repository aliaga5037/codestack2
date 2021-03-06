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
					<li class="current"><a href="/admin/tables"><i class="glyphicon glyphicon-list"></i> Users</a></li>
					<li><a href="/admin/ques"><i class="glyphicon glyphicon-list"></i> Questions</a></li>
					<li><a href="/admin/cats"><i class="glyphicon glyphicon-list"></i> Categories</a></li>
				</ul>
			</div>
		</div>
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
										<th>{{$users->username}}</th>
										<th>Edit</th>
										<th>Delete</th>
									</tr>
								</thead>
								<tbody>
									
									@foreach($users->question as $question)
									<tr>
										<td><a href="/{{$users->id}}/question/{{$question->id}}">{!!$question->ques_title!!}</a></td>
										<td><a href="/{{$users->id}}/ques/{{$question->id}}/edit" class="btn btn-primary">Edit</a></td>
										<td>{{ Form::open(['method' => 'DELETE', 'url' => '/question/'.$question->id]) }}
											{{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
										{{ Form::close() }}</td>
									</tr>
									@endforeach
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop