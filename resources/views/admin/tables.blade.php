@extends('layouts.admin')
@section('head')
<link href="/vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">
@stop
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
				</ul>
			</div>
		</div>
		<div class="col-md-10">
			<div class="row">
				<div class="col-md-12">
					<div class="content-box-large">
						<div class="panel-heading">
							<div class="panel-title">Users</div>
						</div>
						<div class="panel-body">
							<table class="table table-bordered">
								
								<th>name</th>
								<th>surname</th>
								<th>username</th>
								<th>email</th>
								<th>role</th>
								<th>questions</th>
								<th>created_at</th>
								<th>updated_at</th>
								<th>Delete</th>
								@if (Auth::user()->role == "admin")
								@foreach ($users as $user)
								
								
								
								
								@unless ($user->role == "admin")
								
								
								<tr>
									<td>{!!$user->name!!}</td>
									<td>{!!$user->surname!!}</td>
									<td>{!!$user->username!!}</td>
									<td>{!!$user->email!!}</td>
									<td>
										{!!$user->role!!}
										{{ Form::open(['url' => 'user/'.$user->id.'/edit','method' => 'PATCH']) }}
										User {{Form::radio('role', 'user')}}<br>
										Mentor {{Form::radio('role', 'mentor')}}<br>
										@if (Auth::user()->role == "admin")
										Muellim {{Form::radio('role', 'muellim')}}<br>
										@endif
										{{ Form::submit('Change', ['class' => 'btn btn-primary']) }}
										{{ Form::close() }}
									</td>
									<td><a href="{{$user->path()}}/questions">suallar</a></td>
									<td>{!!$user->created_at!!}</td>
									<td>{!!$user->updated_at!!}</td>
									<td>{{ Form::open(['method' => 'DELETE', 'url' => 'user/'.$user->id]) }}
										{{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
									{{ Form::close() }}</td>
								</tr>
								@endunless
								
								@endforeach
								@endif
								{{-- For muellim)) --}}
								@if (Auth::user()->role == "muellim")
								@foreach ($users as $user)
								
								
								
								
								@unless ($user->role == "admin")
								
								
								<tr>
									<td>{!!$user->name!!}</td>
									<td>{!!$user->surname!!}</td>
									<td>{!!$user->username!!}</td>
									<td>{!!$user->email!!}</td>
									<td>
										{!!$user->role!!}
										@unless ($user->role == 'muellim')
										{{ Form::open(['url' => 'user/'.$user->id.'/edit','method' => 'PATCH']) }}
										User {{Form::radio('role', 'user')}}<br>
										Mentor {{Form::radio('role', 'mentor')}}<br>
										{{ Form::submit('Change', ['class' => 'btn btn-primary']) }}
										{{ Form::close() }}
										@endunless
									</td>
									<td><a href="{{$user->path()}}/questions">suallar</a></td>
									<td>{!!$user->created_at!!}</td>
									<td>{!!$user->updated_at!!}</td>
									<td>
										@unless ($user->role == 'muellim')
										{{ Form::open(['method' => 'DELETE', 'url' => 'user/'.$user->id]) }}
										{{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
										{{ Form::close() }}
										@endunless
									</td>
								</tr>
								@endunless
								
								@endforeach
								@endif
								{{-- For mentor --}}
								@if (Auth::user()->role == "mentor")
								@foreach ($users as $user)
								
								
								
								
								@unless ($user->role == "admin" || $user->role == "muellim")
								
								
								<tr>
									<td>{!!$user->name!!}</td>
									<td>{!!$user->surname!!}</td>
									<td>{!!$user->username!!}</td>
									<td>{!!$user->email!!}</td>
									<td>{!!$user->role!!}</td>
									<td><a href="{{$user->path()}}/questions">suallar</a></td>
									<td>{!!$user->created_at!!}</td>
									<td>{!!$user->updated_at!!}</td>
									<td>
										@unless ($user->role == "mentor")
										{{ Form::open(['method' => 'DELETE', 'url' => 'user/'.$user->id]) }}
										{{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
										{{ Form::close() }}
										@endunless
									</td>
								</tr>
								@endunless
								
								@endforeach
								@endif
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="/vendors/datatables/js/jquery.dataTables.min.js"></script>
<script src="/vendors/datatables/dataTables.bootstrap.js"></script>
<script src="/js/custom.js"></script>
<script src="/js/tables.js"></script>
@stop