@extends('admin.master')

@section('title', 'Post')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="col-md-12 box">
			<div class="page-header">
				<h4>Edit Post</h4>
			</div>
			
			@include('common.errors')

			{{ Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) }}

			    <div class="form-group">
			    	{{ Form::label('title', 'Title') }}
					{{ Form::text('title', null, array('class' => 'form-control title-slug')) }}
			    </div>
			    <div class="form-group">
			    	{{ Form::label('slug', 'Slug') }}
					{{ Form::text('slug', null, array('class' => 'form-control slug')) }}
			    </div>
				<div class="form-group">
					{{ Form::label('content', 'Content') }}
					{{ Form::textarea('content', null, array('class' => 'form-control tiny')) }}
				</div>
				<div class="form-group">
					{{ Form::label('category', 'Category') }}
					<select name="categories[]" class="form-control select2" multiple id="category">
						@foreach($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<button type="submit" name="submit" class="btn btn-success">Submit</button>
				</div>
			{{ Form::close() }}
		</div>
	</div>
</div>

@endsection