<div class="page-header">
	<h4>Categories</h4>
</div>

@if (session('list-success')) 
	<div class="alert alert-success">{{ session('list-success') }}</div>
@endif

<table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Slug</th>
      <th width="65">Action</th>
    </tr>
  </thead>
  <tbody>
	<?php 
	$no = 1; 
	?>
  	@foreach($categories as $category)
		<tr>
	      <th scope="row">{!! $no++ !!}</th>
	      <td>{!! $category->name !!}</td>
	      <td>{!! $category->slug !!}</td>
	      <td>
	      	{{ Form::open(['url' => 'categories/'.$category->id, 'class' => 'pull-right'])}}
				{{ Form::hidden('_method', 'DELETE') }}
				<button class="btn btn-danger btn-xs" type="submit" title="Delete">
					<i class="fa fa-trash"></i> 
				</button> 
	      	{{ Form::close() }}
	      	<a href="{{ url('categories/'.$category->id.'/edit') }}" class="btn btn-default btn-xs" title="Edit"><i class="fa fa-pencil"></i></a>
	      </td>
	    </tr>
  	@endforeach

  </tbody>
</table>