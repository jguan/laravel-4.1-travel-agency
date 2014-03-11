<?php

class Photo extends Eloquent {

	protected $fillable = array(
        'tour_id',
        'name',
        'path'
    );

	public static $rules = array(
        'tour_id'=>'required|integer|min:1',
        'name'=>'required',
        'path'=>'required|image|mimes:jpeg,jpg,bmp,png,gif'
	);

	public function route() {
		return $this->belongsTo('Tour');
	}

}
