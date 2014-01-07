@extends('base')

@section('head')
<title>Custommade</title>
<!-- PLUGIN CSS -->
	{{HTML::style('assets/plugins/fullcalendar/fullcalendar.css')}} 
 	{{HTML::style('assets/plugins/pace/pace-theme-flash.css')}} 
 	{{HTML::style('assets/plugins/bootstrap-datepicker/css/datepicker.css')}} 
 	{{HTML::style('assets/plugins/jquery-ricksaw-chart/css/rickshaw.css')}} 
 	{{HTML::style('assets/plugins/jquery-morris-chart/css/morris.css')}} 
 	{{HTML::style('assets/plugins/jquery-slider/css/jquery.sidr.light.css')}} 
 	{{HTML::style('assets/plugins/bootstrap-select2/select2.css')}} 
 	{{HTML::style('assets/plugins/jquery-jvectormap/css/jquery-jvectormap-1.2.2.css')}} 
 	{{HTML::style('assets/plugins/boostrap-checkbox/css/bootstrap-checkbox.css')}}
<!-- END PLUGIN CSS -->

<!-- BEGIN CORE CSS FRAMEWsORK -->
	{{HTML::style('assets/plugins/boostrapv3/css/bootstrap.min.css')}} 
 	{{HTML::style('assets/plugins/boostrapv3/css/bootstrap-theme.min.css')}} 
 	{{HTML::style('assets/plugins/font-awesome/css/font-awesome.css')}} 
 	{{HTML::style('assets/css/dashboard/animate.min.css')}}
<!-- END CORE CSS FRAMEWORK -->

<!-- BEGIN CSS TEMPLATE -->
	{{HTML::style('assets/css/dashboard/style.css')}} 
 	{{HTML::style('assets/css/dashboard/responsive.css')}} 
 	{{HTML::style('assets/css/dashboard/custom-icon-set.css')}}
<!-- END CSS TEMPLATE -->
@stop

@section('body')
	@include('dashboard.templates.header')

	@yield('content')
<div id="footer">@include('dashboard.templates.footer')</div>
<!-- end footer -->
@stop

@section('scripts')
	{{ javascript_include_tag($userType) }}
@stop