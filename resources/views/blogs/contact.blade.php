@extends('layouts.master')

@section('content') 

<div class="col-md-8 pull-right" id="content">
	<div class="site-content">
		<h2>Let's keep in touch</h2><br>
		<form action="" method="POST" role="form" class="contact-form">
		
			<div class="form-group">
				<label for="">Name *</label>
				<input type="text" class="form-control" placeholder="John Doe">
			</div>
			<div class="form-group">
				<label for="">Email *</label>
				<input type="email" class="form-control" placeholder="example@example.com">
			</div>
			<div class="form-group">
				<label for="">Subject</label>
				<input type="text" class="form-control" placeholder="Greeting">
			</div>
			<div class="form-group">
				<label for="">Message *</label>
				<textarea name="msg" class="form-control" rows="3" required="required" placeholder="Say hello!"></textarea>
			</div>
			<button type="submit" class="btn btn-default btn-contact">Submit</button>
		</form>
	</div>
</div>

@endsection