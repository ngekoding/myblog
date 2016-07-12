<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	@include('common.meta')
	
	<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('vendor/css/bootstrap.min.css') }}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
	<!-- Custom style -->
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>

<body>

	<header>
		<nav class="navbar navbar-default" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{ url('/') }}">
						<img src="{{ asset('images/logo.png') }}" alt="Logo" height="25px">
					</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li><a href="{{ url('/') }}">TERBARU</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">BELAJAR <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="{{ url('search/category/pemula') }}">Pemula</a></li>
								<li><a href="{{ url('search/category/menengah') }}">Menengah</a></li>
								<li><a href="{{ url('search/category/mastah') }}">Mastah</a></li>
							</ul>
						</li>
						<li><a href="{{ url('contact') }}">KONTAK</a></li>
					</ul>
					{{ Form::open(['route' => 'search', 'method' => 'GET', 'class' => 'navbar-form navbar-right', 'role' => 'search']) }}
						<input type="search" name="q" placeholder="Cari..." class="form-control">
					{{ Form::close() }}
				</div>
				<!-- /.navbar-collapse -->
			</div>
		</nav>

	</header>

	@yield('content')

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<p>Copyright &copy; 2016 <a href="#">Nur Muhammad</a>. All rights reserved.</p>
					<ul>
						<li><i class="fa fa-heart fa-2x"></i></li>
						<li><img src="{{ asset('images/icons/laravel.png') }}" alt="Laravel Icon" class="img-responsive"></li>
						<li><img src="{{ asset('images/icons/bootstrap.png') }}" alt="Bootstrap Icon" class="img-responsive"></li>
						<li><img src="{{ asset('images/icons/sass.png') }}" alt="Sass Icon" class="img-responsive"></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>

	<script id="dsq-count-scr" src="//nursblog.disqus.com/count.js" async></script>
	<!-- jQuery -->
	<script src="{{ asset('vendor/js/jquery.min.js') }}"></script>
	<!-- Bootstrap JavaScript -->
	<script src="{{ asset('vendor/js/bootstrap.min.js') }}"></script>
	<!-- Custom js -->
	<script src="{{ asset('js/custom.js') }}"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="Hello World"></script>
	<!-- Go to www.addthis.com/dashboard to customize your tools -->
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5754afdfd7897c7d"></script>
</body>

</html>
