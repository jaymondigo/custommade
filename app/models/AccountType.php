<?php
use LaravelBook\Ardent\Ardent;

class AccountType extends Ardent {

    public function __construct()
    {
        parent::__construct();
 
    }

    public static $rules = array(); 
     
    public function users(){
        return $this->hasMany('User');
    }

}