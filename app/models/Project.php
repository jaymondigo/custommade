<?php
class Project extends Eloquent {

	protected $fillable = array('title', 'description', 'has_dimension', 'has_budget', 'dimension', 'budget', 'type');
	public function __construct()
	{
		$this->title = '';
		$this->description = '';
		$this->has_dimension = false;
		$this->has_budget = false;
		$this->dimension = '';
		$this->budget = '';
		$this->type = 'draft';
		parent::__construct();
		
	}
	protected $with = array('user');

	public function photos(){
		return $this->hasMany('ProjectPhoto');
	}
	public function user(){
		return $this->belongsTo('User');
	}
	
}
?>