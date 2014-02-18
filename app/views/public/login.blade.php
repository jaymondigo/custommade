@extends('base')
@section('head')
<title>Dream Builder Solutions | Login</title>
{{stylesheet_link_tag('public')}}
@stop
@section('body')
<!-- body attr-->
@section('body_attr')class='document-body login error-body no-top' ng-app="pubApp"
@stop
<!-- body attr-->
<!-- Wrapper -->
<div class="container" style="margin-top: 200px;" ng-controller="loginCtrl">
    <div class="row login-container column-seperation">
        <div class="col-md-5 col-md-offset-1">
            <h2>Sign in to Custom Made</h2>
            <p>Make a living doing what you love. Be one of our maker now!<br>
            <a href="{{URL::to('signup')}}">Sign up Now!</a> for a webarch account,It's free and always will be..</p>
            <br>
            <button class="btn btn-block btn-info col-md-8" type="button">
            <span class="pull-left"><i class="icon-facebook"></i></span>
            <span class="bold">Login with Facebook</span> </button>
            <button class="btn btn-block btn-success col-md-8" type="button">
            <span class="pull-left"><i class="icon-twitter"></i></span>
            <span class="bold">Login with Twitter</span>
            </button>
        </div>
        <div class="col-md-5 "> <br>
            @if(isset($error))
            <div class="alert alert-danger alert-dismissable col-md-10">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="padding-right:25px;"></button>
                Invalid email or password.
            </div>
            @endif
            <form id="login-form" class="login-form" name="login_form" action="{{URL::to('/session/login')}}" method="post">
                <div class="row">
                    <div class="form-group col-md-10">
                        <label class="form-label">Username</label>
                        <div class="controls">
                            <div class="input-with-icon  right">
                                <i class=""></i>
                                <input type="text" required name="username" id="txtusername" class="form-control" ng-model="username">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-10">
                        <label class="form-label">Password</label>
                        <span class="help"></span>
                        <div class="controls">
                            <div class="input-with-icon  right">
                                <i class=""></i>
                                <input type="password" ng-model="password" name="password" id="txtpassword" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="control-group  col-md-10">
                        <div class="checkbox checkbox check-success"> <a href="#">Trouble login in?</a>&nbsp;&nbsp;
                            <input type="checkbox" name="remember" id="checkbox1" value="1">
                            <label for="checkbox1">Keep me reminded </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <button class="btn btn-primary btn-cons pull-right" type="submit">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- // Wrapper END -->
@stop
@section('scripts')
{{javascript_include_tag('public')}}
@stop