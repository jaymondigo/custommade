@extends('base')

@section('head')

@stop

@section('body')
	<p>
		Holy guacamole! We received your password change request so our worker gnomes immediately rushed to iron things out.
		<br>
		Below is the information to regain access to your Buy Real Marketing account. 
	</p>
	<br>
	<p>
		Email: {{$email}}
	</p>
	<p>
		New Password: {{$password}}
	</p>
	<p>
		Login here {{HTML::link('/')}}
	</p>
	<br>
	<p>
		Keep this confidential and inaccessible from other individuals (like your mortal enemies plotting your swift n� permanent demise). 
	</p>
	<p>
		A friendly reminder from,
	</p>
	<p>
		Team Buy Real Marketing	
	</p>
@stop