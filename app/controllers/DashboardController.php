<?php

class DashboardController extends BaseController {
    
    public function getMember() {
        return View::make('dashboard.buyer.index')
                        ->with('userType', 'buyer');
    }     

}