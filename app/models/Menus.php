<?php
class Menus extends Eloquent {
	protected $table = 'menus';

	public function parent(){
		return $this->belongsTo('Menus', 'parent_id');
	}

	public function childrens(){
		return $this->hasMany('Menus', 'parent_id');
	}

	public function groupmenus(){
		return $this->hasMany('GroupMenu', 'menu_id');
	}
}