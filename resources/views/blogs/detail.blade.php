@extends('layouts.master')

@if (!empty($post))
	@section('meta')
		<?php
		// Remove html tag from content 
		$content = strip_tags($post->content);
		if (!empty($post->image)) {
			$featureImg = $post->image;
		} else {
			preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $post->content, $image);
			$image['src'] = !empty($image) ? url($image['src']) : '';
		}
		?>
		<meta property="og:url" content="{{ url('blog/'.$post->slug) }}" />
		<meta property="og:title" content="{{ $post->title }}" />
		<meta property="og:description" content="{!! strlen($content) > 150 ? substr($content, 0, 150) . '...' : $content !!}" />
		<meta property="og:image" content="{{ !empty($featureImg) ? url($featureImg) : $image['src'] }}" />
	@endsection
@endif

@section('content')

	@if (!empty($post))
		<article>
			<header>
				<h1>{{ $post->title }}</h1>
				<p class="article-info">
					<i class="fa fa-calendar"></i>  {{ $post->created_at }} &nbsp; <i class="fa fa-user"></i> {{ $post->author->name }}
				</p>
			</header>
			{!! $post->content !!}
			<footer>
				<i class="fa fa-folder"></i> &nbsp;
				@foreach ($post->categories as $category)
					<a href="{{ url('search/category/'.$category->slug) }}">{{ $category->name }}</a> &nbsp; 
				@endforeach
				<span class="pull-right">
					<i class="fa fa-comment"></i> <a href="{{ url('blog/'.$post->slug) . '#disqus_thread' }}" data-disqus-identifier="{{ $post->slug }}">Comments</a>
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