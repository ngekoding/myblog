@extends('admin.master')

@section('title', 'Category')

@section('content')

	<div class="row">
		<div class="col-md-6">
			<div class="col-md-12 box">
				<div class="page-header">
					<h4>Add Category</h4>
				</div>
				
				@include('common.errors')

				{{ Form::open(array('url' => 'categories')) }}
					<div class="form-group">
						{{ Form::label('name', 'Name') }}
						{{ Form::text('name', Form::old('name'), array('class' => 'form-control cat-title')) }}
				    </div>
				    <div class="form-group">
						{{ Form::label('slug', 'Slug') }}
						{{ Form::text('slug', Form::old('slug'), array('class' => 'form-control slug')) }}
				    </div>
				    <div class="form-group">
						{{ Form::label('description', 'Description') }}
						{{ Form::textarea('description', Form::old('desc'), array('class' => 'form-control')) }}
				    </div>
				    <div class="form-group">
						{{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
				    </div>
				{{ Form::close() }}
			</div>
		</div>
		<div class="col-md-6">
			<div class="col-md-12 box">
				
				@include('admin.categories.lists')

			</div>
		</div>
	</div>

@endsection