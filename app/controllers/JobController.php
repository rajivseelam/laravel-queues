<?php

class JobController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$jobs = Job::all();

		return View::make('job.index')->with('jobs',$jobs);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$job_id = Queue::push('JobController@run',array('string' => 'Hello World '));

		Job::create(array('job_id' => $job_id));

		return Redirect::route('job.index');
	}

	public function run($job,$data)
	{

		$job_id = $job->getJobId(); // Get job id

		$ejob = Job::where('job_id',$job_id)->first(); // Find the job in database

		$ejob->status = 'running'; //Set job status to running

		$ejob->save();

		File::append('public/queue.txt',$data['string'].$job_id.PHP_EOL); //Add content to file

		$ejob->status = 'finished'; //Set job status to finished

		$ejob->save();

		return true;
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
