@extends('admin.master')

@section('title', 'User')

@section('content')

	<div class="row">
		<div class="col-md-6">
			<div class="col-md-12 box">
				<div class="page-header">
					<h4>Edit User</h4>
				</div>
				
				@include('common.errors')

				{{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}
					<div class="form-group">
						{{ Form::label('name', 'Name') }}
						{{ Form::text('name', null, array('class' => 'form-control')) }}
				    </div>
				    <div class="form-group">
						{{ Form::label('email', 'Email') }}
						{{ Form::email('email', null, array('class' => 'form-control')) }}
				    </div>
				    <div class="form-group">
						{{ Form::label('password', 'Password') }}
						{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Not change if empty')) }}
				    </div>
				    <div class="form-group">
						{{ Form::label('password_confirmation', 'Confirm Password') }}
						{{ Form::password('password_confirmation', array('class' => 'form-control')) }}
				    </div>
				    <div class="form-group">
						{{ Form::label('role', 'Role') }}
						{!! Form::select('roles[]', $roles, $user->roles->lists('id')->toArray(), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
				    </div>
				    <div class="form-group">
						{{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
				    </div>
				{{ Form::close() }}
			</div>
		</div>
		<div class="col-md-6">
			<div class="col-md-12 box">
				
				@include('admin.users.lists')

			</div>
		</div>
	</div>

@endsection