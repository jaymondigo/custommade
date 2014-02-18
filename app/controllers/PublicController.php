<?php

class PublicController extends BaseController {
    
    public function getIndex() { 
        return View::make('public.index')
                        ->with('userType', 'buyer');
    }     
}