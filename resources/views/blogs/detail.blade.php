@extends('layouts.master')

@section('content')

	<section class="section-header">
        <div class="container">
            <h1>{{ $post->title }}</h1>
            <p>
                <span class="label label-success"><i class="fa fa-calendar-o"></i> {{ convertTimestamp($post->created_at) }}</span>
                <span class="label label-primary"><i class="fa fa-user"></i> {{ $post->author->name }}</span>
                @foreach ($post->categories as $category)
                    <a href="{{ url('search/category/'.$category->slug) }}" class="cat-tag-links">
                	   <span class="label label-default">{{ $category->name }}</span>
                    </a>
				@endforeach
            </p>
        </div>
    </section>

	<section class="articles">
		<div class="container articles-content">
			<div class="row">
                <div class="col-md-8 col-sm-8">
                    {!! $post->content !!}
                    <!-- Article Footer -->
                	<hr>
                	@foreach ($post->tags as $tag)
                        <a href="{{ url('search/tag/'.$tag->slug) }}" class="cat-tag-links">
                            <span class="label label-primary">#{{ $tag->name }}</span>
                        </a>
					@endforeach
					
					<div class="clearfix"></div> <br>

					@include('blogs.partials.disqus')

                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="sidebar-item">
                        <div class="sidebar-title">KATEGORI</div>
                        <ul class="category-list">
                        	@foreach ($categories as $category)
                        		<li>
                        			<a href="{{ url('search/category/'.$category->slug) }}">{{ $category->name }}<div class="category-description">{{ $category->description }}</div></a>
                        		</li>
							@endforeach
                        </ul>
                    </div>
                    <div class="sidebar-item">
                        <div class="sidebar-title">ARTIKEL LAINNYA</div>
                        <ul class="article-list">
                        	@foreach($last_posts as $post)
								<li>
									<a href="{{ url('articles/'.$post->slug) }}">
	                                    <img src="{{ !empty($post->image) ? $post->image : asset('images/dummy.png') }}" alt="Image"> {{ $post->title }}
	                                </a>
								</li>
							@endforeach
                        </ul>
                    </div>
                </div>
			</div>
		</div>
	</section>

@endsection