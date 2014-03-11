<?php

class Order extends Eloquent {

    protected $guarded = array('*');

	public static $rules = array(
        'tour_id'=>'required|integer|min:1',
        'date'=>'required|date|date_format:"Y-m-d"|start_time',
        'number_of_people'=>'required|integer|min:1',
        'name'=>'required|min:2',
        'telephone'=>'required|between:10,12',
        'email'=>'required|email',
        'address'=>'required|min:2',
	);

	public function tour() {
		return $this->belongsTo('Tour');
	}

}
