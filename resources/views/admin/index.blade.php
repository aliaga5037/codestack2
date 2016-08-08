@extends('layouts.admin')
@section('head')
<link href="/css/styles.css" rel="stylesheet">
<link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">
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
</head>
@section('content')
{{--  	<div class="header">
<div class="container">
	<div class="row">
		<div class="col-md-5">
			<!-- Logo -->
			<div class="logo">
				<h1><a href="index.html">Bootstrap Admin Theme</a></h1>
			</div>
		</div>
		<div class="col-md-5">
			<div class="row">
				<div class="col-lg-12">
					<div class="input-group form">
						<input type="text" class="form-control" placeholder="Search...">
						<span class="input-group-btn">
							<button class="btn btn-primary" type="button">Search</button>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-2">
			<div class="navbar navbar-inverse" role="banner">
				<nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
							<ul class="dropdown-menu animated fadeInUp">
								<li><a href="admin. profile.html">Profile</a></li>
								<li><a href="admin. login.html">Logout</a></li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>
</div>
--}}
<div class="page-content">
<div class="row">
	<div class="col-md-2">
		<div class="sidebar content-box" style="display: block;">
			<ul class="nav">
				<!-- Main menu -->
				<li class="current"><a href="/adminPage"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
				<li><a href="/admin/tables"><i class="glyphicon glyphicon-list"></i> Tables</a></li>
				<li><a href="/admin/ques"><i class="glyphicon glyphicon-list"></i> Questions</a></li>
				<li><a href="/admin/cats"><i class="glyphicon glyphicon-list"></i> Categories</a></li>
			</ul>
		</div>
	</div>
	<div class="col-md-10">
		<div class="row">
			<div class="col-md-6">
				<div class="content-box-large">
					<div class="panel-heading">
						<div class="panel-title">New vs Returning Visitors</div>
						
						<div class="panel-options">
							<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
							<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
						</div>
					</div>
					<div class="panel-body">
						Ut tristique adipiscing mauris, sit amet suscipit metus porta quis. Donec dictum tincidunt erat, eu blandit ligula. Nam sit amet dolor sapien. Quisque velit erat, congue sed suscipit vel, feugiat sit amet enim. Suspendisse interdum enim at mi tempor commodo. Sed tincidunt sed tortor eu scelerisque. Donec luctus malesuada vulputate. Nunc vel auctor metus, vel adipiscing odio. Aliquam aliquet rhoncus libero, at varius nisi pulvinar nec. Aliquam erat volutpat. Donec ut neque mi. Praesent enim nisl, bibendum vitae ante et, placerat pharetra magna. Donec facilisis nisl turpis, eget facilisis turpis semper non. Maecenas luctus ligula tincidunt iasdsd vitae ante et,
						<br /><br />
						Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque sed consectetur erat. Maecenas in elementum libero. Sed consequat pellentesque ultricies. Ut laoreet vehicula nisl sed placerat. Duis posuere lectus n, eros et hendrerit pellentesque, ante magna condimentum sapien, eget ultrices eros libero non orci. Etiam varius diam lectus.
						<br /><br />
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-12">
						<div class="content-box-header">
							<div class="panel-title">New vs Returning Visitors</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
						<div class="content-box-large box-with-header">
							
							Pellentesque luctus quam quis consequat vulputate. Sed sit amet diam ipsum. Praesent in pellentesque diam, sit amet dignissim erat. Aliquam erat volutpat. Aenean laoreet metus leo, laoreet feugiat enim suscipit quis. Praesent mauris mauris, ornare vitae tincidunt sed, hendrerit eget augue. Nam nec vestibulum nisi, eu dignissim nulla.
							<br /><br />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="content-box-header">
							<div class="panel-title">New vs Returning Visitors</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
						<div class="content-box-large box-with-header">
							
							Pellentesque luctus quam quis consequat vulputate. Sed sit amet diam ipsum. Praesent in pellentesque diam, sit amet dignissim erat. Aliquam erat volutpat. Aenean laoreet metus leo, laoreet feugiat enim suscipit quis. Praesent mauris mauris, ornare vitae tincidunt sed, hendrerit eget augue. Nam nec vestibulum nisi, eu dignissim nulla.
							<br /><br />
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 panel-warning">
				<div class="content-box-header panel-heading">
					<div class="panel-title ">New vs Returning Visitors</div>
					
					<div class="panel-options">
						<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
						<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
					</div>
				</div>
				<div class="content-box-large box-with-header">
					Pellentesque luctus quam quis consequat vulputate. Sed sit amet diam ipsum. Praesent in pellentesque diam, sit amet dignissim erat. Aliquam erat volutpat. Aenean laoreet metus leo, laoreet feugiat enim suscipit quis. Praesent mauris mauris, ornare vitae tincidunt sed, hendrerit eget augue. Nam nec vestibulum nisi, eu dignissim nulla.
					<br /><br />
				</div>
			</div>
		</div>
	</div>
</div>
</div>
{{-- <script src="https://code.jquery.com/jquery.js"></script>
Include all compiled plugins (below), or include individual files as needed
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/custom.js"></script> --}}
@stop