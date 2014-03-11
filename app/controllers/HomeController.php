<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	#public function showWelcome()
	#{
	#	return View::make('hello');
	#}

    public function __construct() {
        #parent::__construct();
        $this->beforeFilter('csrf', array('on'=>'post'));
    }

    public function getIndex() {
        return View::make('home.index')
            ->with('tours', Tour::orderBy('updated_at', 'desc')->get());
    }

    public function getTour($id) {
        $tour = Tour::find($id);
        return View::make('home.tour')
            ->with('tour', $tour)
            ->with('prices', $tour->prices)
            ->with('photos', $tour->photos);
    }

}
