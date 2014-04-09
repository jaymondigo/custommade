<?php

class DashboardController extends BaseController {
    
    public function getIndex() { 
        return View::make('public.index');
    }     
    public function getMember(){ 
    	return View::make('dashboard.index');

    }
    public function search(){
    	$q = Input::get('q');
    	if(isset($q)&&!empty($q)){
            $search = $q; 
            return Project::where('title','like',$q)
                        ->orWhere('description', 'like', $q)
                        ->get();
    	}
    }
}