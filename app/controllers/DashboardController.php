<?php

class DashboardController extends BaseController {
    
    public function getIndex() { 
        return View::make('public.index');
    }     
    public function getMember(){
    	return View::make('dashboard.index');

    }
}