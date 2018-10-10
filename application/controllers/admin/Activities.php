<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Activities extends Admin_controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Daily_model','Amodel');
		$this->load->model('Clients_model','Clients');
		$this->load->helper("activity");
	}



	public function index($value='')
	{
		$data['contacts'] = $this->Clients->get_contacts();
		$this->load->view('admin/activities/activity',$data);

	}
	public function clientActivity($value='')
	{
		$id = $_POST['id'];
		$data['userdatas'] = $this->Amodel->get_data_dates($id);
		$view =	$this->load->view('admin/activities/view',$data,true);
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