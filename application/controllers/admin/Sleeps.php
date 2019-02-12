<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sleeps extends Admin_controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Sleep_model","Sleep");
		$this->load->model('Clients_model','Clients');
		
	}

	public function index($value='')
	{
		$data['contacts'] = $this->Clients->get_contacts();
		$this->load->view('admin/sleeps/sleep',$data);
	}

	public function clientsleep($value='')
	{
		$id = $_POST['id'];
		$data['userdatas'] = $this->Sleep->get_data_dates($id);
		$view =	$this->load->view('admin/sleeps/view',$data,true);
		if($data)
		{
			echo $view;
		}
		else
		{
			$alert = "<div class='alert alert-danger'>
			<strong>Danger!</strong> No Data Found.
			</div>";
			echo $alert;
		}
	}
}

?>