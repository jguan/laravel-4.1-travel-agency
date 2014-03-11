<?php

class PricesController extends BaseController {

	public function __construct() {
		#parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('admin');
	}

	public function getIndex() {
		return View::make('tours.index')
			->with('tours', Tour::all());
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), Price::$rules);

		if ($validator->passes()) {
			$price = new Price;
            $price->tour_id = Input::get('tour_id');
			$price->number_of_people = Input::get('number_of_people');
			$price->price = Input::get('price');
			$price->save();

			return Redirect::back()
				->with('message', '价格创建成功');
		}

		return Redirect::back()
			->with('message', '价格创建失败')
			->withErrors($validator)
			->withInput();
	}

	public function postDestroy() {
		$price = Price::find(Input::get('id'));

		if ($price) {
			$price->delete();
			return Redirect::back()
				->with('message', '价格删除成功');
		}

		return Redirect::back()
			->with('message', '价格删除失败');
	}

}
