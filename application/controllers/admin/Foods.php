<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Foods extends Admin_controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Food_Nutrition_model','Foods');
		$this->load->model('Clients_model','Clients');
		$this->load->helper('food');
	}

	public function index($value='')
	{
		$data['contacts'] = $this->Clients->get_contacts();
		$this->load->view('admin/foods/foods',$data);

	}
	public function clientdata($value='')
	{
		$id = $_POST['id'];
		$data['userdatas'] = $this->Foods->get_data_dates($id);
		$view =	$this->load->view('admin/foods/table_view',$data,true);
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