<?php
class Photo extends Eloquent {
	
	public function album(){
		return $this->belongsTo('Album', 'album_id');
	}
}