@extends('base')
@section('head')
<title>Custom Maker | Imagine. Collaborate. Create</title> 
{{stylesheet_link_tag('dashboard')}}
@stop


@section('body')
<!-- body attr-->
@section('body_attr')class='document-body' ng-app="dash_app" ng-controller="mainCtrl"
@stop
<?php if(!Session::has('alert')){
	$alert = array('type'=>'','message'=>'');
}else{
	$alert = Session::get('alert');
} 
?>
<notification class="notification popover fade bottom in" type='{{$alert['type']}}' style="position:fixed !important; <?php if($alert['type']!='')  echo 'display: block'; else echo 'display: none'; ?>; top: 36px; left: -102px; background: #FFFCEE !important;z-index: 8888888888;">
	<div class="arrow" style="left:66px !important;"></div>
	<h3 class="popover-title">Notifications</h3>
	<div class="popover-content">
		<close class="button">x</close>
		<div style="width:300px">
		  	<div class="notification-messages" >
				<div class="user-profile">
					<img src="mascot.png" alt="" data-src="mascot.png" data-src-retina="mascot.png" width="35" height="35">
				</div>
				<div class="message-wrapper">
					<div class="heading"> 
					</div>
					<div class="message-description">
						{{$alert['message']}}
					</div>
					<!-- <div class="date pull-left">
					A min ago
					</div>	 -->									
				</div>
				<div class="clearfix"></div>									
			</div>										
		</div>				
	</div>
</notification>

<div ui-view>

</div>

@stop
@section('scripts') 
<script user='{{Auth::user()}}'></script>
{{javascript_include_tag('dashboard')}}
@stop
