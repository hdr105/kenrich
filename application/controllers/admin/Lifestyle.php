<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Lifestyle extends Admin_controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Food_Nutrition_model','Foods');
		$this->load->model('Clients_model','Clients');
		$this->load->model("Sleep_model","Sleep");
			$this->load->model('Daily_model','Amodel');

		$this->load->helper("activity");
		$this->load->helper('food');
	}



	public function index()
	{
		$data['contacts'] = $this->Clients->get_contacts();
	
		$this->load->view('admin/lifestyle/index',$data);

	}

	public function clientdata()
	{
		$client_id = $_POST['clientid'];
		$start = $_POST['start_date']; 
		$end = $_POST['end_date'];

		$data['activities'] = $this->Amodel->get_data_where($client_id,$start,$end);
		$data['foods'] = $this->Foods->get_data_where($client_id,$start,$end);
		$data['sleeps'] = $this->Sleep->get_data_where($client_id,$start,$end);
		echo $this->load->view('admin/lifestyle/tabs',$data,true);


	}
}
?>