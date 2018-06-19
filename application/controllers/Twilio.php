<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Twilio extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{




		if(isset($_POST['to']) && $_POST['to'] != '' && isset($_POST['msg']) && $_POST['msg'] != '' ) {

		$num = explode(',', $_POST['to']);

		$this->load->library('twilio');

		$from = '(415) 843-2876';
		$message = $_POST['msg'];
     	foreach ($num as $key => $value) {
     	    $to = "+$value";
     		//$response = $this->twilio->sms($from, $to, $message);

     		// insert into databse

     		$data = array(
     				'sms_to' => $to,
     				'sms_from' => $from,
     				'sms_text' => $message,
     				'sms_dateTime' => date('Y-m-d h:i:s')
     			);

     		$this->db->insert('tbl_sms', $data);
     	}


		if($response->IsError){

			echo json_encode(array('status' => FALSE, 'message' => $response->ErrorMessage));
		}else{

			// insert data into database

			echo json_encode(array('status' => TRUE, 'message' => 'SMS sent!'));
		}

	  }else{

	  	echo json_encode(array('status' => FALSE, 'message' => 'Paramter missing!'));
	  }
	}

}

/* End of file twilio_demo.php */