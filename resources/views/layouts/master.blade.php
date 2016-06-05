<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Nur's Blog</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ asset('vendor/css/bootstrap.min.css') }}">
		<!-- Custom style -->
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{ url('blog') }}"><img src="{{ asset('images/logo-blog-2.png') }}" alt="Image Logo" height="25px"></a>
				</div>
		
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="/">Home</a></li>
						<li><a href="{{ url('blog') }}">Blog</a></li>
						<li><a href="{{ url('about') }}">About</a></li>
						<li><a href="{{ url('contact') }}">Contact</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
		
		<div class="container">
			<div class="col-md-8">
				
				@yield('content')

			</div>
			<div class="col-md-4">
				<div class="side">
					<header>SEARCH</header>
					<form action="" method="get" class="form-search">
						<input type="search" name="q" id="q" placeholder="Keywords...">
					</form>
				</div>
				<div class="side">
					<header>RECENT POSTS</header>
					@foreach($last_posts as $post)
						<?php 
						// Remove html tag from content 
						$content = strip_tags($post->content);
						$content = strlen($content) > 60 ? substr($content, 0, 60) . "..." : $content;
						?>
						<div class="media">
							@if (!empty($post->image))
								<a class="pull-left" href="{{ url('blog/'.$post->slug) }}">
									<img class="media-object" src="{{ $post->image }}" alt="Image" width="64px">
								</a>
							@endif
							<div class="media-body">
								<h4 class="media-heading"><a href="{{ url('blog/'.$post->slug) }}">{{ $post->title }}</a></h4>
								{!! $content !!}
							</div>
						</div>
					@endforeach
				</div>
				<div class="side">
					<header>CATEGORIES</header>
					<div class="list-group side-list">
						@foreach ($categories as $category)
							<a href="/search/category/{{ $category->slug }}" class="list-group-item">{{ $category->name }} <span class="badge">{{ $category->posts->count() }}</span></a>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		
		<footer id="footer">
			<div class="container">
				<div class="col-md-4">
					<header><h3>About</h3></header>
					<h4>I am Nur Muhammad</h4>
					<p>Someone who will create a <i>beautifull website</i> for your bussiness.</p>
				</div>
				<div class="col-md-4">
					<header><h3>Tags</h3></header>
					@foreach ($tags as $tag)
						<a href="/search/tag/{{ $tag->slug }}" class="tag-item">{{ $tag->name }}</a>
					@endforeach
				</div>
				<div class="col-md-4">
					<header><h3>Contact</h3></header>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus vel quas, mollitia et pariatur reprehenderit nesciunt adipisci modi totam consectetur fugiat at delectus dolorum corrupti veniam distinctio nam corporis, cumque.</p>
				</div>
			</div>
		</footer>
		<script id="dsq-count-scr" src="//nursblog.disqus.com/count.js" async></script>
		<!-- jQuery -->
		<script src="{{ asset('vendor/js/jquery.min.js') }}"></script>
		<!-- Bootstrap JavaScript -->
		<script src="{{ asset('vendor/js/bootstrap.min.js') }}"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>