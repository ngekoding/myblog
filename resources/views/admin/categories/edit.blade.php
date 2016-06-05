@extends('admin.master')

@section('title', 'Category')

@section('content')

	<div class="row">
		<div class="col-md-6">
			<div class="col-md-12 box">
				<div class="page-header">
					<h4>Edit Category</h4>
				</div>
				
				@include('common.errors')
				@include('common.success')

				{{ Form::model($category, array('route' => array('categories.update', $category->id), 'method' => 'PUT')) }}
					<div class="form-group">
						{{ Form::label('name', 'Name') }}
						{{ Form::text('name', null, array('class' => 'form-control')) }}
				    </div>
				    <div class="form-group">
						{{ Form::label('description', 'Description') }}
						{{ Form::textarea('description', null, array('class' => 'form-control', 'rows' => '3')) }}
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