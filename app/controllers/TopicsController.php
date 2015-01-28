<?php

class TopicsController extends AuthorizedController {
	public function showAll(){
		$topics = Topic::all();
		return View::make('topics.list')->with('topics', $topics);
	}

	public function addTopic(){
		return View::make('topics.add');
	}

	public function insertTopic(){
		$validation = Validator::make(Input::all(), array(
			'name' => 'required|unique:topics,name',
			'description' => 'min:10',
		));

		if($validation->fails()){
			return Redirect::back()->withErrors($validation);
		}
		else {
			// Created
			$topic = new Topic();

			// Fill
			// $_GET/POST['name'] -> SQL Injection
			$topic->name = Input::get('name'); // Input::post('name') = WRONG!
			$topic->description = Input::get('description');
			$topic->user_id = Sentry::getUser()->id;

			// Save
			$topic->save();

			return Redirect::to('topics')->with('success', 'Topic has been inserted');
		}
	}

	public function editTopic($topic_id){
		try {
			$topic = Topic::findOrFail($topic_id);
		}
		catch(Exception $e){
			return Redirect::to('topics')->with('error', 'No topic found');
		}
		return View::make('topics.edit')->with('data', $topic);
	}

	public function updateTopic($topic_id){
		$validation = Validator::make(Input::all(), array(
			'name' => 'required',
			'description' => 'min:10',
		));

		if($validation->fails()){
			return Redirect::back()->withErrors($validation);
		}
		else {
			// Update
			$topic = Topic::findOrFail($topic_id); // SELECT

			// Fill
			// $_GET/POST['name'] -> SQL Injection
			$topic->name = Input::get('name'); // Input::post('name') = WRONG!
			$topic->description = Input::get('description');
			$topic->user_id = Sentry::getUser()->id; // Hemangi

			// Save
			$topic->save(); // UPDATE

			return Redirect::to('topics')->with('success', 'Topic has been inserted');
		}
	}

	public function deleteTopic($topic_id){
		// Delete
		$topic = Topic::findOrFail($topic_id); // SELECT

		$topic->delete();

		return Redirect::to('topics')->with('success', 'Topic has been deleted');
	}
}