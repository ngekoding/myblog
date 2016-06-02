@extends('admin.master')

@section('title', 'Tag')

@section('content')

	<div class="row">
		<div class="col-md-6">
			<div class="col-md-12 box">
				<div class="page-header">
					<h4>Edit Tag</h4>
				</div>
				
				@include('common.errors')
				@include('common.success')

				{{ Form::model($tag, array('route' => array('tags.update', $tag->id), 'method' => 'PUT')) }}
					<div class="form-group">
						{{ Form::label('name', 'Name') }}
						{{ Form::text('name', null, array('class' => 'form-control title-slug')) }}
				    </div>
				    <div class="form-group">
						{{ Form::label('slug', 'Slug') }}
						{{ Form::text('slug', null, array('class' => 'form-control slug')) }}
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
				
				@include('admin.tags.lists')

			</div>
		</div>
	</div>

@endsection