@extends('layouts.master')

@section('content')
	
	@foreach($posts as $post)
		<article>
			<header>
				<h1><a href="#">{{ $post->title }}</a></h1>
				<p class="article-info">
					<i class="fa fa-calendar"></i>  {{ $post->created_at }} &nbsp; <i class="fa fa-user"></i> {{ $post->author->name }}
				</p>
			</header>
			<!-- Remove image tag from content -->
			<?php $content = preg_replace('/<img[^>]+\>/i', '', $post->content) ?>
			<!-- Show only 300 characters -->
			@if (strlen($content) > 300)
				{!! substr($content, 0, 300) . '...' !!}
			@else
				{!! $content !!}
			@endif
			
			<footer>
				<i class="fa fa-folder"></i> &nbsp;
				@foreach ($post->categories as $category)
					<a href="{{ url('search/category/'.$category->slug) }}">{{ $category->name }}</a> &nbsp; 
				@endforeach
				<span class="pull-right">
					<i class="fa fa-comment"></i> <a href="#">16 Comments</a> &nbsp;
					<a href="#" title="Share to Facebook"><i class="fa fa-facebook-square"></i> </a>
					<a href="#" title="Share to Twitter"> <i class="fa fa-twitter-square"></i></a>
				</span>
			</footer>
		</article>
	@endforeach
	
	{!! $posts->links() !!}

@endsection