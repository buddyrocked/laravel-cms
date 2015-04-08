<?php

class Comment extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

	public function post()
	{
		return $this->belongsTo('Post', 'post_id');
	}

}