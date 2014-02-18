@extends('base')

@section('head')
	{{HTML::style('css/bootstrap.min.css')}}
	<?php echo stylesheet_link_tag($manifestFile = 'public', $attributes = array()) ?>
@stop

@section('body')
	<div class='wrapper'>
		<div class="login-holder">
			
			<div class='logo-holder'>
				<a href="{{URL::to('/')}}">{{image_tag('register/logo-forget-password.png', array('class' => 'img-responsive logo'))}}</a>
			</div>
			
			<hr>
			
			<div class='form-holder'>
				
				@include('apps.templates.alerts')
				<form method="post" role='form' action="{{URL::to('register/forgot-password')}}" onsubmit="return validate()">
					<div class="form-group">
						<label>Email</label>
						<div class='input-group'>
							<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
							<input type="email" required="required" class="form-control input-lg" placeholder="Email" name="email">
						</div>
					</div>
					<div class="form-group">
						<label class=''></label>
						<input class="btn btn-success btn-lg btn-block" type="submit" value="Reset my password">
					</div>
				</form>
				
			</div>
			<div class='create-account-holder'>
				<div class="create-account"> We will <span class="flesh">email</span> you a new password for your account.  </div>
			</div>
		</div>
	</div>
@stop

@section('scripts')
	{{ javascript_include_tag('public') }}
@stop