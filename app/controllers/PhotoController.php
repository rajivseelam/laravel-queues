<?php

class PhotoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$photos = Photo::all();

		return View::make('photo.index')->with('photos',$photos);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('photo.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$file = Input::file('photo'); // Get the file

		$extension = $file->getClientOriginalExtension(); //Get the extension

		$filename = time().'.'.$extension; //Prepare filename

		$upload_success = $file->move('public/uploads', $filename); //Move file

		Photo::create(array('path' => 'uploads/'.$filename )); //Store info in DB

		return Redirect::route('photo.index');

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$photo = Photo::find($id);

		return View::make('photo.edit')->with('photo',$photo);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$data['photo_id'] = $id;
		$data['width'] = Input::get('width');
		$data['height'] = Input::get('height');

		$job_id = Queue::push('PhotoController@resize',$data);

		Job::create(array('job_id' => $job_id));

		return Redirect::route('photo.index');
	}


	public function resize($job,$data)
	{

		$job_id = $job->getJobId(); // Get job id

		$ejob = Job::where('job_id',$job_id)->first(); // Find the job in database

		$ejob->status = 'running'; //Set job status to running

		$ejob->save();

		$photo = Photo::find($data['photo_id']);

		$filename = $data['width'].'_'.$data['height'].'_'.basename($photo->path);

		Image::open('public/'.$photo->path)
			->resize($data['width'],$data['height'],true)
			->save('public/uploads/'.$filename);

		Photo::create(array('path' => 'uploads/'.$filename ));

		$ejob->status = 'finished'; //Set job status to finished

		$ejob->save();

		return true;

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
