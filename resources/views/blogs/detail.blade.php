@extends('layouts.master')

@section('content')

	@if (!empty($post))
		<article>
			<header>
				<h1>{{ $post->title }}</h1>
				<p class="article-info">
					<i class="fa fa-calendar"></i>  {{ $post->created_at }} &nbsp; <i class="fa fa-user"></i> {{ $post->author->name }}
				</p>
			</header>
			<?php
			// Remove html tag from content 
			$content = strip_tags($post->content);
			$content = strlen($content) > 100 ? substr($content, 0, 100) . "..." : $content;
			?>
			{!! $post->content !!}
			<footer>
				<i class="fa fa-folder"></i> &nbsp;
				@foreach ($post->categories as $category)
					<a href="{{ url('search/category/'.$category->slug) }}">{{ $category->name }}</a> &nbsp; 
				@endforeach
				<span class="pull-right">
					<i class="fa fa-comment"></i> <a href="{{ url('blog/'.$post->slug) . '#disqus_thread' }}" data-disqus-identifier="{{ $post->slug }}">Comments</a> &nbsp;
					<a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]={{ $post->title }}&amp;p[summary]={{ $content }}&amp;p[url]={{ url('blog/'.$post->slug) }}', 'sharer', 'toolbar=0,status=0,width=550,height=400');" target="_parent" href="javascript: void(0)"><i class="fa fa-facebook-square"></i></a>
					<a href="#" title="Share to Facebook"><i class="fa fa-facebook-square"></i> </a>
					<a href="#" title="Share to Twitter"> <i class="fa fa-twitter-square"></i></a>
				</span>
			</footer>
		</article>
		<article>
			@include('blogs.partials.disqus')
		</article>
	@else
		<article>
			<header>
				<h1>Ooops...</h1>
			</header>
			<p>The page you are looking for <strong>Not Found!</strong></p>
		</article>
	@endif

@endsection