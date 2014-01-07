@extends('base')
@section('head')
	<title>Dream Builder Solutions | Login</title>
	{{HTML::style('assets/css/pages/module.admin.page.login.min.css')}} 
@stop
@section('body')

<!-- body attr-->
@section('body_attr')class='document-body login'
@stop
<!-- body attr-->

	<!-- Wrapper -->
<div id="login">

	<div class="container">
	
		<div class="wrapper">
		
			<h1 class="glyphicons lock">Dream Builder Solutions <i></i></h1>
		
			<!-- Box -->
			<div class="widget widget-heading-simple widget-body-gray">
				
				<div class="widget-body">
					@if(isset($error))
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Invalid email or password.
				</div>
				@endif
					<!-- Form --> 
					{{Form::open(array('url' => 'session/login', 'method' => 'POST','class'=>'row'))}}
						{{Form::label('email', 'Username or Email');}}
						{{Form::text('email',Input::old('email'),array('class'=>'input-block-level form-control','placeholder'=>'Your Username or Email address'));}}
						
						<label >Password <a class="password" href="">forgot it?</a></label>
						{{Form::password('password',array('class'=>'input-block-level form-control margin-none','placeholder'=>'Your Password'));}}
						<div class="separator bottom"></div> 
					
							<div class="col-md-8 padding-none ">
								<div class="uniformjs innerL">
									<label class="checkbox">
									{{Form::checkbox('remember', 'remember-me', false);}} 
									Remember me
									</label>
								</div>
							</div>
							<div class="col-md-4 pull-right padding-none">
								<button class="btn btn-block btn-inverse" type="submit">Sign in</button>
							</div>
						
					</form>
					<!-- // Form END -->
							
				</div>
				<div class="widget-footer">
					<p class="glyphicons restart"><i></i>Please enter your username and password ...</p>
				</div>
			</div>
			<!-- // Box END -->
			
			<div class="innerT center">
			
				<a href="{{URL::to('register')}}" class="btn btn-icon-stacked btn-block btn-success glyphicons user_add"><i></i><span>Don't have an account?</span><span class="strong">Sign up</span></a>
				
				<p class="innerT">Alternatively</p>
				<a href="index.html?lang=en" class="btn btn-icon-stacked btn-block btn-facebook glyphicons-social facebook"><i></i><span>Join using your</span><span class="strong">Facebook Account</span></a>
				<p>or</p>
				<a href="index.html?lang=en" class="btn btn-icon-stacked btn-block btn-google glyphicons-social google_plus"><i></i><span>Join using your</span><span class="strong">Google Account</span></a>
				<p>Having troubles? <a href="faq.html?lang=en">Get Help</a></p>
			</div>
			
		</div>
		
	</div>
	
</div>
<!-- // Wrapper END -->
 
@stop

@section('scripts') 
@stop