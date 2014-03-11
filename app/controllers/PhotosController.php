<?php

class PhotosController extends BaseController {

    private $destination;

	public function __construct() {
		#parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('admin');
        $this->destination = "public/img/photos/";
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), Photo::$rules);

		if ($validator->passes()) {
			$photo = new Photo;
            $photo->tour_id = Input::get('tour_id');
			$photo->name = Input::get('name');

            $image = Input::file('path');
            $filename = date('Y-m-d-H:i:s')."-".$image->getClientOriginalName();
            Image::make($image->getRealPath())->resize(800, 450)->save($this->destination.$filename);
            $photo->path = 'img/photos/'.$filename;

			$photo->save();

			return Redirect::back()
				->with('message', '图片上传成功');
		}

		return Redirect::back()
			->with('message', '图片上传失败')
			->withErrors($validator)
			->withInput();
	}

	public function postDestroy() {
		$photo = Photo::find(Input::get('id'));

		if ($photo) {
			$photo->delete();
			return Redirect::back()
				->with('message', '图片删除成功');
		}

		return Redirect::back()
			->with('message', '图片删除失败');
	}

}
