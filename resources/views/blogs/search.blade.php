@extends('layouts.master')

@section('content')
	
	<section class="articles">
		<div class="container articles-content other-articles">
			<div class="row">
				<div class="col-md-12">
					@if (count($posts) > 0)
						<h3>Hasil pencarian: <strong><i>{{ \Request::get('q') }}</i></strong></h3> <br>
					@else
						<h3>Tidak ditemukan artikel dengan kata kunci <strong><i>{{ \Request::get('q') }}</i></strong></h3>
						<hr>
					@endif
				</div>
			</div>
			<div class="row">
				@if (count($posts) > 0)
					@foreach($posts as $post)
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
									<span style="float: right">
										<a href="{{ url('articles/'.$post->slug) }}#comments"><i class="fa fa-comment"></i></a>
										<a href="{{ url('articles/'.$post->slug) }}#disqus_thread">0</a>
									</span>
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
									<span style="float: right">
										<a href="{{ url('articles/'.$post->slug) }}#comments"><i class="fa fa-comment"></i></a>
										<a href="{{ url('articles/'.$post->slug) }}#disqus_thread">0</a>
									</span>
								</div>
							</div>
						</div>
					@endforeach
				@endif
			</div>
		</div>
	</section>

@endsection