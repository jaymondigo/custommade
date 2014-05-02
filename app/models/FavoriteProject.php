<?php
class FavoriteProject extends Eloquent {
  
	public function __construct(){ 
		$this->delegate->project;
	}

	public function project(){
		return $this->hasOne('Project', 'id');
	}
	public function user(){
		return $this->belongsTo('User');
	}
	
}
?>