<?php

class MediaItem extends \Eloquent {
	protected $fillable = [];

	public function media(){
		return $this->belongsTo('Media', 'media_id');
	}
}