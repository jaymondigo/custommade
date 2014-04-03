@extends('base')
@section('head')
<title>Dream Builder Solutions | Login</title> 
{{stylesheet_link_tag('dashboard')}}
@stop


@section('body')
<!-- body attr-->
@section('body_attr')class='document-body' ng-app="dash_app" ng-controller="mainCtrl"
@stop

<div style="position: absolute;z-index: 9999;width: 100%;text-align: center;">
  <alert ng-repeat="alert in alerts" type="alert.type" close="closeAlert($index)" ng-bind="alert.msg"></alert>
</div>

<div ui-view>

</div>

@stop
@section('scripts') 
<script user='{{Auth::user()}}'></script>
{{javascript_include_tag('dashboard')}}
@stop
