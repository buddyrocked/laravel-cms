<?php

class Schedule extends \Eloquent {
	protected $fillable = ['place', 'staff_id', 'description', 'date_start', 'date_close'];

	public static $rules = [
			'place'=>'required',
			'staff_id'=>'required',
			'date_start'=>'required',
			'date_close'=>'required',
			'file' => 'max:10000|mimes:jpeg,jpg,png'
	];

	public function staff(){
		return $this->belongsTo('Staff', 'staff_id');
	}
}