<?php
use LaravelBook\Ardent\Ardent;

class Media extends Ardent {

    public function __construct()
    {
        parent::__construct();
 
    }

    public static $rules = array(); 
     
    public function owner(){
        return $this->belongsTo('User');
    }

}