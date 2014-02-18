@extends('base')

@section('head')
	<title>Client Portal - BuyRealMarketing</title>
	{{ stylesheet_link_tag('dashboard') }}
@stop

@section('body')
	<div id="wrap">
	
		@include('dashboard.templates.header')
		
	    <div class='content'>
	      <div class='container'>
	      	@include('dashboard.templates.alerts')
	        <div class='row test'>
	          <div class="col-lg-2 sidenav-holder full-height">
	            @include('dashboard.templates.sidenav')
	          </div>
	          <div class="col-lg-10 main-holder">
	            <div class="main">
	              @yield('content')
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	<div id="push"></div>  
	</div> <! -- end wrap --> 
	<div id="footer">
		@include('dashboard.templates.footer')
	</div> <!-- end footer -->

	@include('dashboard.templates.forgot_password')

    

@stop

@section('scripts')
	{{ javascript_include_tag('dashboard') }}
@stop