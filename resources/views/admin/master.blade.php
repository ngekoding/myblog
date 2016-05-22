<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Nur's Blog - Administrator</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{!! asset('vendor/css/bootstrap.min.css') !!}">
		<!-- Custom style -->
		<link rel="stylesheet" href="{!! asset('admin/css/default.css') !!}">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{!! asset('vendor/font-awesome/css/font-awesome.min.css') !!}">
		<!-- Select2 -->
		<link rel="stylesheet" href="{!! asset('vendor/select2/css/select2.css') !!}">

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
				<div class="col-md-2 col-md-pull-10 col-xs-3 col-xs-pull-9 sidebar no-mar-pad" style="position: fixed">
					<header class="v-middle">Nur's Blog</header>
					<div class="sidebar-box">
						<nav>
							<ul class="sidebar-menu">
								<li><a href=""><i class="fa fa-dashboard fa-2x"></i> Dashboard</a></li>
								<li><a href=""><i class="fa fa-bookmark-o fa-2x"></i> Post</a></li>
								<li><a href=""><i class="fa fa-bookmark-o fa-2x"></i> Category</a></li>
								<li><a href=""><i class="fa fa-user fa-2x"></i> User</a></li>
								<li><a href=""><i class="fa fa-cog fa-2x"></i> Settings</a></li>
								<li><a href=""><i class="fa fa-sign-out fa-2x"></i> Logout</a></li>
							</ul>
						</nav>
					</div>
				</div>
				<div class="col-md-10 col-md-push-2 col-xs-9 col-xs-push-3 content no-mar-pad">
					<header class="v-middle">
						@yield('title')
					</header>
					
					@yield('content')

				</div>
			</div>
		</div>

		<!-- jQuery -->
		<script src="{!! asset('vendor/js/jquery.min.js') !!}"></script>
		<!-- Select2 -->
		<script src="{!! asset('vendor/select2/js/select2.min.js') !!}"></script>
		<script src="{!! asset('admin/js/default.js') !!}"></script>
		<!-- Bootstrap JavaScript -->
		<script src="{!! asset('vendor/js/bootstrap.min.js') !!}"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>