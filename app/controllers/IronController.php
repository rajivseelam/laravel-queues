<?php

class IronController extends Controller {

	protected $ironmq;

	public function __construct()
	{
		$this->ironmq = new IronMQ(array(
					    "token" => 'XXXXXXXXXXXXXXXXXXX', //Your token from dashboard
					    "project_id" => 'XXXXXXXXXXXXXXXXXXX' //Your project ID from dashboard
					));
	}


	public function create()
	{
		$params = array(
		    "retries" => 5
		);

		$this->ironmq->updateQueue('testing', $params);

		return 'Push Queue Created';
	}

	public function push()
	{
		//Just some data you want to pass
		$data = array(
			'first_name' => 'Rajiv', 
			'last_name'  => 'Seelam'
		);

		//Convert data into a string so that we can pass it
		$data = serialize($data);

		//Post the message
		$job = $this->ironmq->postMessage('testing', $data);

		Log::info(__METHOD__.' - Message pushed with job_id : '.$job->id);

		return Redirect::to('iron/status/'.$job->id);
	}

    public function receive()
    {
		$req = Request::instance();

		$jobId = $req->header('iron-message-id');

		$data = unserialize($req->getContent());

		$fullname = $data['first_name'].' '.$data['last_name'];

		Log::info(__METHOD__.' - Job Received From Iron with Job ID : '.$jobId);
		Log::info(__METHOD__.' - '.$data['first_name']);
		
		return Response::json(array(),200);
	}

	public function status($id)
	{
		$status = $this->ironmq->getMessagePushStatuses('testing',$id);

		dd($status);
	}

}
