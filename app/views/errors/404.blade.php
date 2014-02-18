@extends('base')

@section('head')
	{{HTML::style('css/bootstrap.min.css')}}
	<style type="text/css">
		html,body{
			height: 100%;
			padding: 0px;
			margin: 0px;
		}
		.main-container{
			background-image: url("<?php echo URL::to('assets/errors/404bg.jpg') ?>");
			background-size: cover;
			height: 100%;
		}
		.page-holder{
			margin-top: 20%;
			border-radius: 4px;
			background-color: #fff;
			padding: 20px;
			min-height: 200px;
		}
		.btn{
			padding-left: 50px;
			padding-right: 50px;
		}
	</style>
@stop

@section('body')
	<div class="main-container">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-lg-offset-8">
					<div class="page-holder">
						<h2>
						I think you we're lost. Please go back to your dashboard.
						</h2>
						<br>
						<p>
							<a href="{{URL::to('/')}}" class="btn btn-success btn-lg ">GO</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop