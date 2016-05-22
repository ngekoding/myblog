<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Nur's Blog</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{!! asset('vendor/css/bootstrap.min.css') !!}">
		<!-- Custom style -->
		<link rel="stylesheet" href="{!! asset('css/default.css') !!}">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{!! asset('vendor/font-awesome/css/font-awesome.min.css') !!}">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		
		<div class="container-fluid">
			<div class="row">
			<div class="{!! $headWidth !!} flex" id="sidebar">
				<div class="text-center flex-child">
					<p align="center">
						<img src="images/profile.jpg" class="img-responsive img-circle sidebar-img" alt="Image" width="150" height="150">
					</p>
					<h2>Nur</h2>
					<p>UI/UX Designer</p>
					<hr width="50px" size="5px">
					<ul class="sidebar-menu">
						<li><a href="{!! url('blog') !!}">Blog</a></li>
						<li><a href="{!! url('about') !!}">About</a></li>
						<li><a href="{!! url('contact') !!}">Contact</a></li>
					</ul>
				</div>
			</div>
			</div>
		</div>

		@yield('content')

		<!-- jQuery -->
		<script src="{!! asset('vendor/js/jquery.min.js') !!}"></script>
		<script src="{!! asset('js/default.js') !!}"></script>
		<!-- Bootstrap JavaScript -->
		<script src="{!! asset('vendor/js/bootstrap.min.js') !!}"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>