<?php
class Tag extends Eloquent {

	public function post_tag(){
		return $this->hasMany('PostTag', 'tag_id');
	}
		
}