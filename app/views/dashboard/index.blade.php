@extends('base')
@section('head')
<title>Dream Builder Solutions | Login</title>
{{stylesheet_link_tag('public')}}
@stop


@section('body')
<!-- body attr-->
@section('body_attr')class='document-body' ng-app="dash_app" 
@stop

<div ui-view ng-controller="mainCtrl">

</div>

@stop
@section('scripts')
<div user='{{Auth::user()}}'></div>
{{javascript_include_tag('dashboard')}}
@stop
