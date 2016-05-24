@extends('admin.master')

@section('title', 'Post')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="col-md-12 box">
			<div class="page-header">
				<h4>Add Post</h4>
			</div>
			<form role="form">
			    <div class="form-group">
			      <label for="title">Title</label>
			      <input type="text" name="title" class="form-control" id="title">
			    </div>
			    <div class="form-group">
			      <label for="slug">Slug</label>
			      <input type="text" name="slug" class="form-control" id="slug">
			    </div>
				<div class="form-group">
					<label for="content">Content</label>
					<textarea name="content" class="form-control" rows="5" id="content"></textarea>
				</div>
				<div class="form-group">
					<label for="sel1">Category</label>
					<select class="form-control select2" multiple>
						@foreach($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<button type="submit" name="submit" class="btn btn-success">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection