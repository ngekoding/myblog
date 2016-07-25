@extends('admin.master')

@section('title', 'Dashboard')

@section('content')

	<div class="row">
		<div class="col-md-6">
			<div class="col-md-12 box">
				<div class="page-header">
					<h4>Welcome <small>{{ auth()->user()->name }}</small></h4>
				</div>
				<?php $roles = ''; ?>
				@foreach (auth()->user()->roles as $role)
					<?php $roles .= $role->name . ', '; ?>
				@endforeach
				<?php $roles = rtrim($roles, ', '); ?>
				<p>You are <strong>{{ $roles }}</strong> on this website...</p>
			</div>
			<div class="col-md-12 box">
				<div class="page-header">
					@if (auth()->user()->hasRole('admin'))
						<h4>Recent Posts</h4>
					@else
						<h4>Your Recent Posts</h4>
					@endif
				</div>
				<table class="table">
				  <thead>
				    <tr>
				      <th>#</th>
				      <th>Title</th>
				      @if (auth()->user()->hasRole('admin'))
				      <th class="hidden-xs">Author</th>
				      @endif
				      <th width="50">#</th>
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
					      @if (auth()->user()->hasRole('admin'))
					      <td class="hidden-xs">{{ $post->author->name }}</td>
					      @endif
					      <td>
					      	<a href="{{ url('articles/'.$post->slug) }}#comments"><i class="fa fa-comment"></i></a>
							<a href="{{ url('articles/'.$post->slug) }}#disqus_thread">0</a>
					      </td>
					    </tr>
				  	@endforeach
				  </tbody>
				</table>
				<!-- Disqus Comments -->
				<script id="dsq-count-scr" src="//nursblog.disqus.com/count.js" async></script>
			</div>
		</div>
		<div class="col-md-6">
			<div class="col-md-12 box">
				<div class="page-header">
					<h4>Users</h4>
				</div>

				<table class="table">
				  <thead>
				    <tr>
				      <th>#</th>
				      <th>Name</th>
				      <th class="hidden-xs">Email</th>
				      @if (auth()->user()->hasRole('admin'))
				      <th width="65">Action</th>
				      @endif
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
					      <td class="hidden-xs">{{ $user->email }}</td>
						  @if (auth()->user()->hasRole('admin'))
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
					      @endif
					    </tr>
				  	@endforeach

				  </tbody>
				</table>
			</div>
			{!! $users->links() !!}
		</div>
	</div>

@endsection
