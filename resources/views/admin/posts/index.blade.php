@extends('admin.master')

@section('title', 'Post')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="col-md-12 box">
			<div class="page-header">
				<h4>Posts <a href="{{ url('posts/create') }}" class="btn btn-default btn-sm">Add New</a></h4>
			</div>
			<table class="table">
			  <thead>
			    <tr>
			      <th>#</th>
			      <th>Title</th>
			      <th class="hidden-xs">Author</th>
			      <th class="hidden-xs">Categories</th>
			      <th class="hidden-xs">Created At</th>
			      <th width="65">Action</th>
			    </tr>
			  </thead>
			  <tbody>
				<?php 
				$no = 1; 
				?>
			  	@foreach($posts as $post)
					<tr>
				      <th scope="row">{{ $no++ }}</th>
				      <td>{{ $post->title }}</td>
				      <td class="hidden-xs">{{ $post->author->name }}</td>
				      <td class="hidden-xs">
				      	<?php $categories = "" ?>
				      	@if(count($post->categories) > 0)
							@foreach($post->categories as $category)
								<?php $categories .= $category->name . ", " ?>
							@endforeach
							{{ rtrim($categories, ', ') }}
						@else
							Uncategorized
						@endif
				      </td>
				      <td class="hidden-xs">{{ $post->created_at }}</td>
				      <td>
						{{ Form::open([
				      			'method' => 'DELETE',
				      			'route' => ['posts.destroy', $post->id], 
				      			'class' => 'pull-right', 
				      			'id' => 'my-form-' . $no
				      	]) }}
							<button class="my-form-{{ $no }} btn btn-danger btn-xs btn-delete" type="submit" title="Delete">
								<i class="fa fa-trash"></i> 
							</button> 
				      	{{ Form::close() }}
				      	<a href="{{ url('posts/'.$post->id.'/edit') }}" class="btn btn-default btn-xs" title="Edit"><i class="fa fa-pencil"></i></a>
				      </td>
				    </tr>
			  	@endforeach

			  </tbody>
			</table>
		</div>
		{!! $posts->links() !!}
	</div>
</div>

@endsection