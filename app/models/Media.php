<?php

class Media extends \Eloquent {
	protected $fillable = [];

	public function mediaItems(){
		return $this->hasMany('MediaItem', 'media_id');
	}

	public static $rules = [
			'name'=>'required',
			'description'=>'required'
	];
}