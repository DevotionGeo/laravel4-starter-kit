<?php

class TopicsController extends AuthorizedController {
	public function showAll(){

	}

	public function addTopic(){
		return View::make('topics.add');
	}

	public function insertTopic(){
		// Created
		$topic = new Topic();

		// Fill
		// $_GET/POST['name'] -> SQL Injection
		$topic->name = Input::get('name'); // Input::post('name') = WRONG!
		$topic->description = Input::get('description');
		$topic->user_id = Sentry::getUser()->id;

		// Save
		$topic->save();

		return Redirect::back()->with('success', 'Topic has been inserted');
	}
}