@extends('base')
@section('head')
	<title>Dream Builder Solutions | Register</title>
	{{HTML::style('assets/css/pages/module.admin.page.signup.min.css')}} 
@stop
@section('body')

<!-- body attr-->
@section('body_attr')class="document-body login"
@stop
<!-- body attr-->
		<!-- Wrapper -->
<div id="login">

	<div class="wrapper signup">
		
			<h1 class="glyphicons lock">Dream Buider Solutions<i></i></h1>
		
			<!-- Box -->
			<div class="widget widget-heading-simple">
				
				<div class="widget-head">
					<h3 class="heading">Create Account</h3>
					<div class="pull-right">
						Already a member?
						<a href="{{URL::to('login')}}" class="btn btn-inverse btn-mini">Sign in</a>
					</div>

				</div>

				<div class="widget-body ">
		
					<!-- Form -->
					{{Form::open(array('url' => 'register/signup', 'method' => 'POST','class'=>''))}}
					
					<!-- Row -->
					<div class="row">
					
						<!-- Column -->
						<div class="col-md-6 padding-none border-right">
							<div class="innerLR"> 
								{{Form::label('username', 'Username')}}
								{{Form::text('username',Input::old('username'),array('class'=>'input-block-level form-control','placeholder'=>'Your Username'))}}
								
								{{Form::label('password', 'Password', array('class'=>'strong'))}} 
								{{Form::password('password',array('class'=>'input-block-level form-control','placeholder'=>'Your Password'))}}
								 
								{{Form::label('password', 'Confirm Password', array('class'=>'strong'))}} 
								{{Form::password('confirm_password',array('class'=>'input-block-level form-control','placeholder'=>'Your Password'))}}
								 
							</div>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="col-md-6 padding-none">
							<div class="innerLR">
								{{Form::label('email', 'Email', array('class'=>'strong'))}} 
								{{Form::text('email',Input::old('email'),array('class'=>'input-block-level form-control','placeholder'=>'Your Email Address'))}}

								{{Form::label('confirm_email', 'Confirm Email', array('class'=>'strong'))}} 
								{{Form::text('email',Input::old('email'),array('class'=>'input-block-level form-control','placeholder'=>'Confirm Email'))}}
								
								<button class="btn btn-icon-stacked btn-block btn-success glyphicons user_add"><i></i><span>Create account and</span><span class="strong">Join Dream Builder now</span></button>
								<p>Having troubles? <a href="faq.html?lang=en">Get Help</a></p>
							</div>
						</div>
						<!-- // Column END -->
						
					</div>
					<!-- // Row END -->
					
					</form>
					<!-- // Form END -->
		
		
				</div>
				<!-- // Box END -->
				
			</div>
			
	</div>
	
</div>
<!-- // Wrapper END -->

@stop

@section('scripts')
 
@stop