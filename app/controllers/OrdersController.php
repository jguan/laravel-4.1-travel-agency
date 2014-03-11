<?php

class OrdersController extends BaseController {

	public function __construct() {
		#parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('admin', array('only'=>array('getOrders', 'postManage')));
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), Order::$rules);

		if ($validator->passes()) {
			$order = new Order;
            $order->tour_id = Input::get('tour_id');
			$order->date = Input::get('date');
			$order->number_of_people = Input::get('number_of_people');
			$order->name = Input::get('name');
			$order->telephone = Input::get('telephone');
			$order->email = Input::get('email');
			$order->address = Input::get('address');
			if (Input::get('others')) $order->others = Input::get('others');
			$order->save();

			return Redirect::back()
				->with('message', '订单已提交，我们会马上和您联系，谢谢！');
		}

		return Redirect::back()
			->with('message', '订单提交错误')
			->withErrors($validator)
			->withInput();
	}

	/*public function postDestroy() {
		$order = Order::find(Input::get('id'));

		if ($order) {
			$order->delete();
			return Redirect::back()
				->with('message', '订单已删除');
		}

		return Redirect::back()
			->with('message', '订单删除失败');
	}*/

    public function getOrders() {
        return View::make('orders.index')
            ->with('orders', Order::orderBy('created_at', 'DESC')->paginate(10));
    }

    public function postManage() {
        $order = Order::find(Input::get('id'));

        if ($order) {
            $order->is_confirmed = Input::get('is_confirmed');
            $order->save();
            return Redirect::back()
                ->with('message', '订单已更新');
        }

        return Redirect::back()
            ->with('message', '订单更新失败');
    }


}
