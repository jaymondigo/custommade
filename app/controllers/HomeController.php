<?php

class HomeController extends BaseController {
    
    public function getIndex() { 
        return View::make('public.index')
                        ->with('userType', 'buyer');
    }     

    public function getSignup(){
    	echo "ytest";
    }

}