@extends('base')
@section('head')
<title>Dream Builder Solutions | Login</title> 
{{stylesheet_link_tag('dashboard')}}
@stop


@section('body')
<!-- body attr-->
@section('body_attr')class='document-body' ng-app="dash_app" ng-controller="mainCtrl"
@stop

<div ui-view>

</div>

@stop
@section('scripts') 
<script user='{{Auth::user()}}'></script>
{{javascript_include_tag('dashboard')}}
@stop
