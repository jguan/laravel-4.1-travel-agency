<?php

class Price extends Eloquent {

	protected $fillable = array(
        'tour_id',
        'number_of_people',
        'price'
    );

	public static $rules = array(
        'tour_id'=>'required|integer|min:1',
        'number_of_people'=>'required|integer|min:1',
        'price'=>'required|numeric|min:0',
	);

	public function route() {
		return $this->belongsTo('Tour');
	}

}
