@extends('layouts.master')

@section('content') 
	
	<article>
		<header><h1>Let's keep in touch</h1></header>

		@include('common.errors')
		@include('common.success')

		{{ Form::open(['url' => 'contact']) }}
			<div class="form-group">
				{{ Form::label('name', 'Name *') }}
				{{ Form::text('name', Form::old('name'), ['class' => 'form-control', 'placeholder' => 'John Doe']) }}
			</div>
			<div class="form-group">
				{{ Form::label('email', 'Email *') }}
				{{ Form::email('email', Form::old('email'), ['class' => 'form-control', 'placeholder' => 'example@example.com']) }}
			</div>
			<div class="form-group">
				{{ Form::label('subject', 'Subject *') }}
				{{ Form::text('subject', Form::old('subject'), ['class' => 'form-control', 'placeholder' => 'Greeting...']) }}
			</div>
			<div class="form-group">
				{{ Form::label('message', 'Message *') }}
				{{ Form::textarea('message', Form::old('message'), ['class' => 'form-control', 'placeholder' => 'Say Hello...', 'rows' => 5]) }}
			</div>
			{{ Form::submit('Send', ['class' => 'btn btn-default']) }}
		{{ Form::close() }}
	</article>

@endsection