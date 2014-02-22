<?php
class Project extends Eloquent {

	protected $fillable = array('title', 'description', 'has_dimension', 'has_budget', 'dimension', 'budget');
	public function __construct()
	{
		$this->title = '';
		$this->description = '';
		$this->has_dimension = false;
		$this->has_budget = false;
		$this->dimension = '';
		$this->budget = '';
		parent::__construct();
		
	}
	
}
?>