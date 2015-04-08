<?php

class Staff extends \Eloquent {
	protected $fillable = ['name', 'position_id', 'motto', 'file', 'user_id'];

	public static $rules = [
			'name'=>'required',
			'position_id'=>'required',
			'motto'=>'required',
			'file' => 'max:10000|mimes:jpeg,jpg,png'
	];

	public function position(){
		return $this->belongsTo('Position', 'position_id');
	}

	public function schedules(){
		return $this->hasMany('Schedule', 'staff_id');
	}

	public function user(){
		return $this->belongsTo('User', 'user_id');
	}
}