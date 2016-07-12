@extends('layouts.master')

@section('content')
	
	<section class="articles">
		<div class="container articles-content other-articles">
			<div class="row">
				<div class="col-md-12">
					@if (count($posts) > 0)
						<h3>{{ ucwords($type) }}: <strong><i>{{ $keywordName->name }}</i></strong></h3> <br>
					@else
						<h3>Tidak ditemukan artikel dengan {{ $type }} <strong><i>{{ $keywordName->name }}</i></strong></h3>
						<hr>
					@endif
				</div>
			</div>
			<div class="row">
				@if (count($posts) > 0)
					@foreach($posts as $post)
						<?php 
						// Get first image from content
						preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $post->content, $image);
						$image['src'] = !empty($image) ? $image['src'] : 'images/dummy.jpg';
						?>
						<div class="col-md-3 col-sm-6">
							<div class="thumbnail">
								<a href="{{ url('articles/'.$post->slug) }}">
									<img src="{{ !empty($post->image) ? $post->image : $image['src'] }}" alt="Image">
								</a>
								<div class="caption">
									<p class="post-date">{{ convertTimestamp($post->created_at) }}</p>
									<h4><a href="{{ url('articles/'.$post->slug) }}">{{ $post->title }}</a></h4>
								</div>
								<div class="footer">
									<i class="fa fa-user"></i> {{ $post->author->name }}
								</div>
							</div>
						</div>
					@endforeach
					<div class="row" style="margin-top: 10px">
						<div class="col-md-12 text-center">
							{!! $posts->links() !!}
						</div>
					</div>
				@else
					<div class="col-md-12">
						<h4>Beberapa artikel berikut mungkin kamu butuhkan:</h4> <br>
					</div>
					@foreach($other_posts as $post)
						<?php 
						// Get first image from content
						preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $post->content, $image);
						$image['src'] = !empty($image) ? $image['src'] : 'images/dummy.jpg';
						?>
						<div class="col-md-3 col-sm-6">
							<div class="thumbnail">
								<a href="{{ url('articles/'.$post->slug) }}">
									<img src="{{ !empty($post->image) ? $post->image : $image['src'] }}" alt="Image">
								</a>
								<div class="caption">
									<p class="post-date">{{ convertTimestamp($post->created_at) }}</p>
									<h4><a href="{{ url('articles/'.$post->slug) }}">{{ $post->title }}</a></h4>
								</div>
								<div class="footer">
									<i class="fa fa-user"></i> {{ $post->author->name }}
								</div>
							</div>
						</div>
					@endforeach
				@endif
			</div>
		</div>
	</section>

@endsection