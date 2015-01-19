<?php

class TestController extends BaseController {
	public function index(){
		return View::make('test.index')->with('name', 'Daksh');
	}

	public function two(){
		return View::make('test.two')->with('name', 'Abc');
	}
}