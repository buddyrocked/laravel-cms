<?php
Class Category extends Eloquent {

	public function posts(){
		return $this->hasMany('Post', 'category_id');	
	}
		
}