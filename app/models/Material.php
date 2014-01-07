<?php
use LaravelBook\Ardent\Ardent;

class Material extends Ardent {

    public function __construct()
    {
        parent::__construct();
 
    }

    public static $rules = array(); 
     
     public function type(){ 
     	return $this->belongsTo('MaterialType','type');
     }
     public function supplier(){
     	return $this->belongsTo('Supplier', 'supplier');
     }
}