<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Food_Nutrition extends Clients_controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Food_Nutrition_model","Food");
		$this->load->helper('food');
		
	}

	public function index ($value='') //view to add food dairy
	{
		
		if (!is_client_logged_in()) {
			redirect(site_url('clients/login'));
		}
		$data['types'] 			= $this->Food->get_all_nutritions();
		$this->data    			= $data;
		$this->view            	= 'food_nurtitions/food_nutrition';
		$this->layout();
	}

	public function add($value='') //add food diary 
	{
	
		$array = array(
			'client_id'=>$this->session->userdata('client_user_id'),
			'fn_date'=>$this->input->post("date"),
			'fn_time'=>$this->input->post("time"),
			'fn_type'=>$this->input->post("type"),
			'fn_desp'=>$this->input->post("desp")
		);
		$data = $this->Food->insert_data("food_nutritions",$array);
		if($data)
		{
			$msg = "Schedule Inserted";
			$this->session->set_flashdata('success',$msg);
			redirect('Food_Nutrition/view');
		}

	}

	public function check($value='') //check food dairy wether today's type is already done or not 
	{
		$date = $_POST['date'];
		$value = $_POST['value'];
		$user_id = $this->session->userdata('client_user_id');
		$response = $this->Food->check($date,$value,$user_id);
		if($response)
		{
			$response['status'] = true;
			$response['msg'] = 'All Ready Updated';
		}
		else
		{
			$response['status'] = false;
		}
		echo json_encode($response);
		exit;
	}

	public function view($value='') // view all dairy of client
	{
		if (!is_client_logged_in()) {
			redirect(site_url('clients/login'));
		}

		$user_id = $this->session->userdata('client_user_id');
		$data['userdatas'] 			= $this->Food->get_data_dates($user_id);
		$this->data    			= $data;
		$this->view            	= 'food_nurtitions/view_food_nutrition';
		$this->layout();
	}

	public function edit($id) // edit dairy via id view
	{
		if (!is_client_logged_in()) {
			redirect(site_url('clients/login'));
		}
		$data['types'] 			= $this->Food->get_all_nutritions();
		$data['foods'] 			= $this->Food->edit($id);
		$this->data    			= $data;
		$this->view            	= 'food_nurtitions/edit_food_nutrition';
		$this->layout();

	}

	public function edit_data() //edit 
	{
		$id = $this->input->post("id");
		$array = array(
			'client_id'=>$this->session->userdata('client_user_id'),
			'fn_date'=>$this->input->post("date"),
			'fn_time'=>$this->input->post("time"),
			'fn_type'=>$this->input->post("type"),
			'fn_desp'=>$this->input->post("desp")
		);
		$data = $this->Food->update_by('fn_id', $id, $array);
		if($data)
		{
			$msg = "Schedule Updated";
			$this->session->set_flashdata('success',$msg);
			redirect('Food_Nutrition/view');
		}
	}

	public function delete($id) //delete
	{
		$data = $this->Food->delete_by('fn_id', $id);
		if($data)
		{
			$msg = "Schedule Deleted";
			$this->session->set_flashdata('success',$msg);
			redirect('Food_Nutrition/view');
		}
	}

}

?>