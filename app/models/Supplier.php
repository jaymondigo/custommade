<?php
use LaravelBook\Ardent\Ardent;

class Supplier extends Ardent {

    public function __construct()
    {
        parent::__construct();
 
    }

    public static $rules = array(); 

    public function branches(){
    	return $this->hasMany('SuppliersBranch');
    }
    public function owner(){
    	return $this->belongsTo('User','owner');
    }
    public function materials(){
        return $this->hasMany('Material');
    }
}