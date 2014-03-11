<?php

class ToursController extends BaseController {

    private $destination;

	public function __construct() {
		#parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('admin');
        $this->destination = "public/img/thumbnails/";
	}

	public function getIndex() {
		$types = array();

		return View::make('tours.index')
			->with('tours', Tour::all());
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), Tour::$rules);

		if ($validator->passes()) {
			$tour = new Tour;
			$tour->title = Input::get('title');
			if (Input::get('description')) $tour->description = Input::get('description');

			$image = Input::file('thumbnail');
			$filename = date('Y-m-d-H:i:s')."-".$image->getClientOriginalName();
            Image::make($image->getRealPath())->resize(800, 450)->save($this->destination.$filename);

            /*$upload = $image->move($destination, $filename);
            if( $upload == false ) {
                return Redirect::to('admin/tours/')
                    ->withInput()
                    ->withErrors($validator)
                    ->with('message', '图片上传失败');
            }*/

			$tour->thumbnail = 'img/thumbnails/'.$filename;
			$tour->save();

			return Redirect::to('admin/tours/index')
				->with('message', '创建成功');
		}

		return Redirect::to('admin/tours/index')
			->with('message', '创建失败')
			->withErrors($validator)
			->withInput();
	}

	public function postDestroy() {
		$tour = Tour::find(Input::get('id'));

		if ($tour) {
			File::delete('public/'.$tour->thumbnail);
			$tour->delete();
			return Redirect::to('admin/tours/index')
				->with('message', '路线删除成功');
		}

		return Redirect::to('admin/tours/index')
			->with('message', '路线删除失败');
	}

    public function getEdit($id) {
        $tour = Tour::find($id);
        return View::make('tours.edit')
        	->with('tour', $tour)
        	->with('prices', $tour->prices)
        	->with('photos', $tour->photos);
    }

	public function postUpdate() {
		$tour = Tour::find(Input::get('id'));

		if ($tour) {
			$tour->title = Input::get('title');
			$tour->description = Input::get('description');

            if (Input::hasFile('thumbnail')) {
                File::delete('public/'.$tour->thumbnail);
                $image = Input::file('thumbnail');
                $filename = date('Y-m-d-H:i:s')."-".$image->getClientOriginalName();
                Image::make($image->getRealPath())->resize(800, 450)->save($this->destination.$filename);
                $tour->thumbnail = 'img/thumbnails/'.$filename;
            }

			$tour->save();
			return Redirect::to('admin/tours/index')->with('message', '路线信息已更新');
		}

		return Redirect::to('admin/tours/index')->with('message', '路线ID无效');
	}
}
