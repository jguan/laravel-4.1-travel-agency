<?php

class Tour extends Eloquent {

	protected $fillable = array(
        'title',
        'description',
        'thumbnail'
    );

	public static $rules = array(
		'title'=>'required|min:2',
		'thumbnail'=>'required|image|mimes:jpeg,jpg,bmp,png,gif'
	);

	public function prices() {
		return $this->hasMany('Price');
	}

	public function photos() {
		return $this->hasMany('Photo');
	}

	public function orders() {
		return $this->hasMany('Order');
	}

}
