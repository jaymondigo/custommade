<?php
use LaravelBook\Ardent\Ardent;

class MaterialType extends Ardent {

    public function __construct()
    {
        parent::__construct();
 
    }

    public static $rules = array(); 
     
     public function materials(){
     	return $this->hasMany('Material');
     }
}