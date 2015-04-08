<?php

class PostAlbum extends \Eloquent {
	protected $fillable = [];

	public function post(){
		return $this->belongsTo('Post', 'post_id');
	}

	public function album(){
		return $this->belongsTo('Album', 'album_id');
	}
}