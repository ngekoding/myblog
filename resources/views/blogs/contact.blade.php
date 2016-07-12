@extends('layouts.master')

@section('content') 
	
	<section class="contact">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<h2><i class="fa fa-question-circle"></i> Butuh bantuan?</h2>
					<hr>
					@include('common.errors')
					@include('common.success')

					{{ Form::open(['url' => 'contact', 'class' => 'contact-form']) }}
						<div class="form-group">
							{{ Form::label('name', 'Nama *') }}
							{{ Form::text('name', Form::old('name'), ['class' => 'form-control', 'placeholder' => 'John Doe']) }}
						</div>
						<div class="form-group">
							{{ Form::label('email', 'Email *') }}
							{{ Form::email('email', Form::old('email'), ['class' => 'form-control', 'placeholder' => 'example@example.com']) }}
						</div>
						<div class="form-group">
							{{ Form::label('subject', 'Judul *') }}
							{{ Form::text('subject', Form::old('subject'), ['class' => 'form-control', 'placeholder' => 'Greeting...']) }}
						</div>
						<div class="form-group">
							{{ Form::label('message', 'Tulis pesan Anda *') }}
							{{ Form::textarea('message', Form::old('message'), ['class' => 'form-control', 'placeholder' => 'Say Hello...', 'rows' => 5]) }}
						</div>
						{{ Form::submit('Kirim Pesan', ['class' => 'btn btn-default btn-block']) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</section>

@endsection