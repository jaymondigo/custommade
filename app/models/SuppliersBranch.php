<?php
use LaravelBook\Ardent\Ardent;

class SuppliersBranch extends Ardent {

    public function __construct()
    {
        parent::__construct();
 
    }

    protected $table = 'suppliers_branch';

    public static $rules = array();  

    public function supplier(){
        return $this->belongsTo('Supplier', 'supplier_id');
    }
    
}