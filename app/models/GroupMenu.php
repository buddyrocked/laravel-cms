<?php

class GroupMenu extends \Eloquent {
	protected $fillable = ['group_id', 'menu_id'];

	public static $rules = [
			//'name'=>'required',
	];

	public function group(){
		return $this->belongsto('Group', 'group_id');
	}

	public function menu(){
		return $this->belongsTo('Menus', 'menu_id');
	}
}