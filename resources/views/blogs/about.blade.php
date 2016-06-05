@extends('layouts.master')

@section('content')

	<article>
		<header><h1>Nur Muhammad</h1></header>
		<p><strong>Who are you?</strong></p>
		<p>Someone who will create a <i>beautiful website</i> for your bussiness.</p>
		<p><strong>What kind of beautiful website?</strong></p>
		<p>Especially UI/UX Design. Like HTML, CSS, Javascript, JQuery and Others.</p>
		<p><strong>So, are you web designer?</strong></p>
		<p>Yup, you are right.</p>
		<p><strong>But what I see just a newbie man.</strong></p>
		<p>Like old people said, <i>"Don't judge the book by the cover."</i></p>
		<p><strong>I have project. Can you help me?</strong></p>
		<p>Of course. I'm very happy to help the others.</p>
		<footer>
			<p>Let's keep in touch, click <a href="{{ url('contact') }}"><strong>here...</strong></a></p>
		</footer>
	</article>

@endsection