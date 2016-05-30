<div class="page-header">
	<h4>Users</h4>
</div>

<table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Email</th>
      <th>Role</th>
      <th width="65">Action</th>
    </tr>
  </thead>
  <tbody>
	<?php 
	$no = 1; 
	?>
  	@foreach($users as $user)
		<tr>
	      <th scope="row">{{ $no++ }}</th>
	      <td>{{ $user->name }}</td>
	      <td>{{ $user->email }}</td>
	      <td>
	      	@if ($user->role->name == 'Administrator')
				Admin
	      	@else
				Author
	      	@endif
	      </td>
	      <td>
	      	{{ Form::open([
	      			'method' => 'DELETE',
	      			'route' => ['users.destroy', $user->id], 
	      			'class' => 'pull-right', 
	      			'id' => 'my-form-' . $no
	      	]) }}
				<button class="my-form-{{ $no }} btn btn-danger btn-xs btn-delete" title="Delete">
					<i class="fa fa-trash"></i> 
				</button> 
	      	{{ Form::close() }}
	      	<a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-default btn-xs" title="Edit"><i class="fa fa-pencil"></i></a>
	      </td>
	    </tr>
  	@endforeach

  </tbody>
</table>