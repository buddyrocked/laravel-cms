<?php
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

Class Post extends Eloquent implements SluggableInterface {

	use SluggableTrait;

	protected $sluggable = [
		'build_from'=>'title',
		'save_to'=>'slug'
	];
	
	public function user(){
		return $this->belongsTo('User', 'user_id');
	}

	public function posttags(){
		return $this->hasMany('PostTag', 'post_id');	
	}

	public function postalbums(){
		return $this->hasMany('PostAlbum', 'post_id');	
	}

	public function comments(){
		return $this->hasMany('Comment', 'post_id');
	}

	public function category(){
		return $this->belongsTo('Category','category_id');
	}
}
