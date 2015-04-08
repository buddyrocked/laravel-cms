<?php

class Position extends \Eloquent {
	protected $fillable = ['name'];

	public static $rules = [
			'name'=>'required',
	];
}