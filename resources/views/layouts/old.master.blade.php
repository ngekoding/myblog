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
					<a class="navbar-brand" href="/"><img src="{{ asset('images/logo-blog-2.png') }}" alt="Image Logo" height="25px"></a>
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
					{{ Form::open(['route' => 'blog.search', 'method' => 'GET', 'class' => 'form-search']) }}
						<input type="search" name="q" placeholder="Keywords...">
					{{ Form::close() }}
				</div>
				<div class="side">
					<header>RECENT POSTS</header>
					@foreach($last_posts as $post)
						<?php 
						// Remove html tag from content 
						$content = strip_tags($post->content);
						$content = strlen($content) > 60 ? substr($content, 0, 60) . "..." : $content;
						// Get first image from content
						preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $post->content, $image);
						if (empty($image)) {
							$image['src'] = '';
						}
						?>
						<div class="media">
							@if (!empty($post->image) OR !empty($image['src']))
								<a class="pull-left" href="{{ url('blog/'.$post->slug) }}">
									<img class="media-object" src="{{ !empty($post->image) ? $post->image : $image['src'] }}" alt="Image" width="64px">
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
							<a href="{{ url('blog/search/category/'.$category->slug) }}" class="list-group-item">{{ $category->name }} <span class="badge">{{ $category->posts->count() }}</span></a>
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
					<p>Someone who will create a <b>beautifull website</b> for your bussiness.</p>
				</div>
				<div class="col-md-4">
					<header><h3>Tags</h3></header>
					@foreach ($tags as $tag)
						<a href="{{ url('blog/search/tag/'.$tag->slug) }}" class="tag-item">{{ $tag->name }}</a>
					@endforeach
				</div>
				<div class="col-md-4">
					<header><h3>Contact</h3></header>
					<p>To keep communication, you can find me on Facebook, Twitter or sending me an e-mail.</p>
					<a href="https://www.facebook.com/about.nurmuhammad" target="_blank"><i class="fa fa-facebook fa-lg"></i></a>
					<a href="https://www.twitter.com/websiternewbie" target="_blank"><i class="fa fa-twitter fa-lg"></i></a>
					<a href="{{ url('contact') }}"><i class="fa fa-google-plus fa-lg"></i></a>
				</div>
			</div>
		</footer>
		<script id="dsq-count-scr" src="//nursblog.disqus.com/count.js" async></script>
		<!-- jQuery -->
		<script src="{{ asset('vendor/js/jquery.min.js') }}"></script>
		<!-- Bootstrap JavaScript -->
		<script src="{{ asset('vendor/js/bootstrap.min.js') }}"></script>
		<!-- Custom js -->
		<script src="{{ asset('js/blog.js') }}"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
 		<!-- Go to www.addthis.com/dashboard to customize your tools -->
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5754afdfd7897c7d"></script>
	</body>
</html>