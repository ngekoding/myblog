@extends('layouts.master')

@section('content')
	
	<section class="section-showcase" style="background: #21231E url({{ asset('images/headline.jpg') }}) right no-repeat">
		<div class="container showcase-content">
			<div class="row">
				<div class="col-md-9">
					<h1><a href="{{ url('articles/'.$headline->slug) }}">{{ $headline->title }}</a></h1>
					<p>{{ convertTimestamp($headline->created_at) }}</p>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<div class="block block-primary">
						<h3>1. PEMULA</h3>
						<p>Bekal yang harus kamu persiapkan untuk memulai belajar pemrograman.</p>
						<a href="{{ url('search/category/pemula') }}" class="btn btn-default pull-right">MASUK<i class="fa fa-fw fa-angle-right"></i></a>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="block block-secondary">
						<h3>2. MENENGAH</h3>
						<p>Mengasah kemampuanmu lebih jauh dalam pemrograman.</p>
						<a href="{{ url('search/category/menengah') }}" class="btn btn-default pull-right">MASUK<i class="fa fa-fw fa-angle-right"></i></a>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="block block-primary">
						<h3>3. MASTAH</h3>
						<p>Materi yang akan menjadikan kamu mastah dalam pemrograman.</p>
						<a href="{{ url('search/category/mastah') }}" class="btn btn-default pull-right">MASUK<i class="fa fa-fw fa-angle-right"></i></a>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="section-light">
		<div class="container articles-content feature-articles">
			<div class="row">
				@foreach ($last_posts as $post)
					<?php
					// Remove html tag
					$content = strip_tags($post->content);
					?>
					<div class="col-md-4 col-sm-6">
						<div class="thumbnail">
							<a href="{{ url('articles/'.$post->slug) }}">
								<img src="{{ !empty($post->image) ? $post->image : asset('images/dummy.png') }}" alt="Image">
							</a>
							<div class="caption">
								<p class="post-date">{{ convertTimestamp($post->created_at) }}</p>
								<h3><a href="{{ url('articles/'.$post->slug) }}">{{ $post->title }}</a></h3>
								<p>{{ str_limit($content, 145) }}</p>
							</div>
							<div class="footer">
								<i class="fa fa-user"></i> {{ $post->author->name }}
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</section>

	<section class="articles">
		<div class="container articles-content other-articles">
			<div class="row">
				@foreach ($other_posts as $post)
					<div class="col-md-3 col-sm-6">
						<div class="thumbnail">
							<a href="{{ url('articles/'.$post->slug) }}">
								<img src="{{ !empty($post->image) ? $post->image : asset('images/dummy.png') }}" alt="Image">
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
			</div>
			<div class="row" style="margin-top: 10px">
				<div class="col-md-12 text-center">
					<a class="btn btn-default" href="{{ url('articles') }}">Lihat Artikel Lainnya<i class="fa fa-fw fa-angle-right"></i></a>
				</div>
			</div>
		</div>
	</section>

@endsection