<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Nur's Blog - Administrator</title>
		<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ asset('vendor/css/bootstrap.min.css') }}">
		<!-- Custom style -->
		<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
		<!-- Select2 -->
		<link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.css') }}">
		<!-- Sweetalert -->
		<link rel="stylesheet" href="{{ asset('vendor/sweetalert/sweetalert.css') }}">
		<!-- TinyMCE -->
		<script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
		
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>

		<div class="container-fluid wrapper">
			<div class="row">
				<div class="col-md-2 col-md-pull-10 col-sm-3 col-sm-pull-9 sidebar no-mar-pad hidden-xs" style="position: fixed">
					<header class="v-middle">
						<img src="{{ asset('images/logo-blog-2.png') }}" alt="Image Logo" height="30px">
					</header>
					<div class="sidebar-box">
						<nav>
							<ul class="sidebar-menu">
								<li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard fa-2x"></i> Dashboard</a></li>
								@if (auth()->user()->hasRole('admin'))
									<li><a href="{{ url('users') }}"><i class="fa fa-user fa-2x"></i> User</a></li>
								@endif
								@if (auth()->user()->hasRole('author') || auth()->user()->hasRole('admin'))
									<li><a href="{{ url('categories') }}"><i class="fa fa-bookmark-o fa-2x"></i> Category</a></li>
									<li><a href="{{ url('tags') }}"><i class="fa fa-bookmark-o fa-2x"></i> Tag</a></li>
								@endif
								<li><a href="{{ url('posts') }}"><i class="fa fa-bookmark-o fa-2x"></i> Post</a></li>
								<li><a href="{{ url('user/setting') }}"><i class="fa fa-cog fa-2x"></i> Settings</a></li>
								<li><a href="{{ url('logout') }}"><i class="fa fa-sign-out fa-2x"></i> Logout</a></li>
							</ul>
						</nav>
					</div>
				</div>
				<div class="col-md-10 col-md-push-2 col-sm-9 col-sm-push-3 col-xs-12 content no-mar-pad">
					<nav class="navbar navbar-inverse navbar-fixed-top visible-xs" role="navigation">
						<div class="container-fluid">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand" href="{{ url('dashboard') }}">
									<img src="{{ asset('images/logo-blog-2.png') }}" alt="Image Logo" height="25px">
								</a>
							</div>
					
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse navbar-ex1-collapse">
								<ul class="nav navbar-nav">
									<li><a href="{{ url('dashboard') }}"></i> Dashboard</a></li>
									@if (auth()->user()->hasRole('admin'))
										<li><a href="{{ url('users') }}">User</a></li>
									@endif
									@if (auth()->user()->hasRole('author') || auth()->user()->hasRole('admin'))
										<li><a href="{{ url('categories') }}">Category</a></li>
										<li><a href="{{ url('tags') }}">Tag</a></li>
									@endif
									<li><a href="{{ url('posts') }}">Post</a></li>
									<li><a href="{{ url('user/setting') }}">Settings</a></li>
									<li><a href="{{ url('logout') }}">Logout</a></li>
								</ul>
							</div><!-- /.navbar-collapse -->
						</div>
					</nav>
					<header class="v-middle content-title">
						@yield('title')
					</header>
					
					@yield('content')

				</div>
			</div>
		</div>

		<!-- jQuery -->
		<script src="{{ asset('vendor/js/jquery.min.js') }}"></script>
		<!-- Select2 -->
		<script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
		<!-- Sweetalert -->
		<script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>
		<script src="{{ asset('js/sweetalert-custom.js') }}"></script>
		@include('sweet::alert')
		<!-- Custrom JS -->
		<script src="{{ asset('js/admin.js') }}"></script>
		<!-- Bootstrap JavaScript -->
		<script src="{{ asset('vendor/js/bootstrap.min.js') }}"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>