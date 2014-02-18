@extends('base')
@section('head')
<title>Dream Builder Solutions | Register</title>
{{stylesheet_link_tag('public')}}
@stop
@section('body')
<!-- body attr-->
@section('body_attr')class="document-body error-body no-top" ng-app="pubApp"
@stop
<!-- body attr-->
<!-- Wrapper --> 
    <div class="container">
        <div class="row login-container column-seperation">
            <!-- <div class="col-md-5 col-md-offset-1">
                                        <h2>Sign up to Custom Made</h2>
                                        <p>Make a living doing what you love. Be one of our maker now!<br>
                                            <a href="#">Sign up Now!</a> for a Custom Made account,It's <strong>free</strong> and always will be..</p>
                                        <br>
                                <button class="btn btn-block btn-info col-md-8" type="button">
                                        
                                            <span class="bold">Be one of our maker today!</span> </button>
            </div> -->
            <div class="col-md-6 col-md-offset-3"> <br>
                <div class="logo-container" style="text-align:center;margin-bottom: 50px;">
                    <a href="index.html"> <img src="assets/logo_new_black.png" style="height: 139px;"></a>
                </div>

                <form id="signup-form" name="signup_form" class="login-form" action="{{URL::to('/session/signup')}}" method="post" style="margin-left: 80px;">

                     @if(isset($errors[0]))
                     <div class="row">
                        <div class="alert alert-danger alert-dismissable col-md-10">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="padding-right:25px;"></button>
                            @foreach ($errors as $error)
                                <p>{{$error}}</p>
                            @endforeach
                        </div>
                    </div>
                    @endif 

                    <div class="row" >
                        <div class="form-group col-md-10" ng-class="{'has-error': signup_form.email.$invalid && signup_form.email.$dirty}">
                            <label class="form-label">Email address</label>
                            <div class="controls">
                                <div class="input-with-icon  right">
                                    <i class=""></i>
                                    <input ensure-unique="email" type="email" required name="email" ng-model="email" id="txtusername" class="form-control" placeholder="Enter email">
                                    <div class="error" 
                                        ng-show="signup_form.email.$dirty && signup_form.email.$invalid">
                                    <small class="error" ng-show="signup_form.email.$error.required">Email is required</small>
                                    <small class="error" ng-show="signup_form.email.$error.email">Email is not valid</small>
                                    <small class="error" ng-show="signup_form.email.$error.unique">Email is already used</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" >
                        <div class="form-group col-md-10" ng-class="{'has-error': signup_form.first_name.$invalid && signup_form.first_name.$dirty}">
                            <label class="form-label">First name</label>
                            <div class="controls">
                                <div class="input-with-icon  right">
                                    <i class=""></i>
                                    <input type="text" required name="first_name" ng-model="first_name" id="txtusername" class="form-control" placeholder="Enter First name">
                                    <div class="error" 
                                        ng-show="signup_form.first_name.$dirty && signup_form.first_name.$invalid">
                                    <small class="error" ng-show="signup_form.first_name.$error.required">Firstname is required</small> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" >
                        <div class="form-group col-md-10" ng-class="{'has-error': signup_form.last_name.$invalid && signup_form.last_name.$dirty}">
                            <label class="form-label">Last name</label>
                            <div class="controls">
                                <div class="input-with-icon  right">
                                    <i class=""></i>
                                    <input type="text" required name="last_name" ng-model="last_name" id="txtusername" class="form-control" placeholder="Enter Last name">
                                    <div class="error" 
                                        ng-show="signup_form.last_name.$dirty && signup_form.last_name.$invalid">
                                    <small class="error" ng-show="signup_form.last_name.$error.required">Lastname is required</small> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-10" ng-class="{'has-error': signup_form.password.$invalid && signup_form.password.$dirty}">
                            <label class="form-label">Password</label>
                            <span class="help"></span>
                            <div class="controls">
                                <div class="input-with-icon  right">
                                    <i class=""></i>
                                    <input type="password" required ng-model="password" name="password" ng-model="password" id="txtpassword" class="form-control"  placeholder="Enter password">
                                    <div class="error" 
                                        ng-show="signup_form.password.$dirty && signup_form.password.$invalid">    
                                    <small class="error" ng-show="signup_form.password.$error.required">Password is required</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="row">
                        <div class="form-group col-md-10" ng-class="{'has-error': signup_form.confirm_password.$invalid && signup_form.confirm_password.$dirty}">
                            <label class="form-label">Password</label>
                            <span class="help"></span>
                            <div class="controls">
                                <div class="input-with-icon right">
                                    <i class=""></i>
                                    <input type="password" required data-password-verify='password' ng-model="password_verify" name="confirm_password" id="txtpassword" class="form-control"  placeholder="Confirm password">  
                                    <small class="error" ng-show="signup_form.confirm_password.$dirty && signup_form.confirm_password.$error.passwordVerify">Password confirmation did not match</small>       
                                </div>
                            </div>
                        </div>
                    </div>

                                    
                    <div class="row">
                        <div class="control-group  col-md-10" ng-class="{'has-error': signup_form.term.$error.dirty}">
                            <div class="checkbox checkbox check-success" data-toggle="tooltip" title="Please accept our terms and agreement" data-placement="bottom" data-original-title="Please accept our terms and agreement"> &nbsp;&nbsp;
                                <input type="checkbox" id="checkbox1" name="term" ng-model="term" value="1" required>
                                <label for="checkbox1" style="margin-left: -10px;">I accept the terms of the <a href="#">Buyer Agreement</a></label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10" data-toggle="tooltip" title="Please accept our terms and agreement" data-placement="bottom" data-original-title="Please accept our terms and agreement">
                            <button class="btn btn-primary btn-block btn-cons pull-right" type="submit" style="margin-right: 0px;" ng-disabled="signup_form.$invalid" >Sign up</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="margin-left: 40px;">
                            <span><a href="{{URL::to('login')}}">Already have an account? Login</a> · <a href="">Want to be a maker?</a></span>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12" style="margin-top: 90px;
                        text-align: center;">
                        <div class="footer col-md-9 col-md-offset-1" style="margin-left: 63px;text-align: center;">
                            <span>©2001-2013 All Rights Reserved. Customily® is a registered trademark of The Rocket Science Group. <a href="">Privacy and Terms</a></span>
                        </div>
                    </div>
                </div>
                <br/>
                 <br/>
                 
            </div>
        </div>
    </div>
 
<!-- // Wrapper END -->
@stop
@section('scripts')
{{javascript_include_tag('public')}}
@stop