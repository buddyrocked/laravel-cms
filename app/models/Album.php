<?php
class Album extends Eloquent{

	protected $fillable = ['name', 'description'];
	
	public static $rules = [
			'name'=>'required',
			'description'=>'required',
	];

	public function photos(){
		return $this->hasMany('Photo', 'album_id');
	}

	public function postalbums(){
		return $this->hasMany('PostAlbum', 'album_id');
	}
}