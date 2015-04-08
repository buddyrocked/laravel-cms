<?php
class PostTag extends Eloquent {
	
	protected $table = 'post_tag';
	public $timestamps = false;
	
	public function post(){
		return $this->belongsTo('Post', 'post_id');
	}

	public function tag(){
		return $this->belongsTo('Tag', 'tag_id');
	}

}