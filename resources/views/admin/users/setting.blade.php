@extends('admin.master')

@section('title', 'Settings')

@section('content')

	<div class="row">
		<div class="col-md-6">
			<div class="col-md-12 box">
				<div class="page-header">
					<h4>Setting your account</h4>
				</div>
				
				@include('common.errors')
				
				{{ Form::model($user, ['route' => ['user.setting'], 'method' => 'PUT']) }}
					<div class="form-group">
						{{ Form::label('name', 'Name') }}
						{{ Form::text('name', null, array('class' => 'form-control')) }}
				    </div>
				    <div class="form-group">
						{{ Form::label('email', 'Email') }}
						{{ Form::email('email', null, array('class' => 'form-control')) }}
				    </div>
				    <div class="form-group">
						{{ Form::label('password', 'New Password') }}
						{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Not change if empty')) }}
				    </div>
				    <div class="form-group">
						{{ Form::label('password_confirmation', 'Confirm New Password') }}
						{{ Form::password('password_confirmation', array('class' => 'form-control')) }}
				    </div>
				    <div class="form-group">
						{{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
				    </div>
				{{ Form::close() }}
			</div>
		</div>
	</div>

@endsection