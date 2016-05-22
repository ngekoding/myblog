@if (count($errors) > 0)
	<div class="alert alert-danger" role="alert">
		<strong><i class="fa fa-exclamation-triangle"></i> Whoops! Something went wrong!</strong><br><br>
		@foreach($errors->all() as $error)
			{{ $error }} <br>
		@endforeach
	</div>
@endif