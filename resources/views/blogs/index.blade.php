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
		<link rel="stylesheet" href="{!! asset('css/home-style.css') !!}">
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
				<div class="col-md-12 flex" id="home">
					<div class="text-center flex-child">
						<p align="center">
							<img src="images/logo.png" class="img-responsive home-img" alt="Image" width="150" height="150">
						</p><br>
						<p><strong>I'm Nur,</strong> maker of fine things that live on the interwebs.</p><br>
						<ul class="home-menu">
							<li><a href="{{ url('blog') }}" data-toggle="tooltip" title="Blog" data-placement="left"><i class="fa fa-bookmark"></i></a></li>
							<li><a href="{{ url('about') }}" data-toggle="tooltip" title="About" data-placement="bottom"><i class="fa fa-user"></i></a></li>
							<li><a href="{{ url('contact') }}" data-toggle="tooltip" title="Contact" data-placement="right"><i class="fa fa-map-marker"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- jQuery -->
		<script src="{!! asset('vendor/js/jquery.min.js') !!}"></script>
		<!-- Bootstrap JavaScript -->
		<script src="{!! asset('vendor/js/bootstrap.min.js') !!}"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
 		<script>
 			$(function () {
			  $('[data-toggle="tooltip"]').tooltip();
			});
 		</script>
	</body>
</html>