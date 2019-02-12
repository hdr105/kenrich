<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daily_Activity extends Clients_controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("activity");
		$this->load->model("Daily_model","Daily");
		
	}

	public function index ($value='') //add sleep diary view
	{
		
		if (!is_client_logged_in()) {
			redirect(site_url('clients/login'));
		}
		$data['types'] = $this->Daily->activities();
		$this->data    			= $data;
		$this->view            	= 'daily_activities/add';
		$this->layout();
	}

	public function add($value='')
	{	
		$count = $this->input->post("time_slot");
		if($count == 10)
		{
			$cycle = 1;
		}
		if($count == 20)
		{
			$cycle = 2;
		}
		if($count == 30)
		{
			$cycle = 3;
		}
		if($count == 40)
		{
			$cycle = 4;
		}
		if($count == 50)
		{
			$cycle = 5;
		}
		if($count == 60)
		{
			$cycle = 6;
		}
		$array = array(
			'client_id'=>$this->session->userdata('client_user_id'),
			'a_time'=>$this->input->post("time_slot"),
			'a_type'=>$this->input->post("type"),
			'a_cycles'=>$cycle,
			'a_created_at'=>date("y-m-d")
		);
		$data = $this->Daily->insert_data("activities",$array);
		if($data)
		{
			$msg = "Activity Inserted";
			$this->session->set_flashdata('success',$msg);
			redirect('Daily_Activity/view');
		}
	}

	public function view($value='')
	{
		if (!is_client_logged_in()) {
			redirect(site_url('clients/login'));
		}
		$user_id = $this->session->userdata('client_user_id');
		$data['activities'] = $this->Daily->get_data_dates($user_id);
		
		$this->data    			= $data;
		$this->view            	= 'daily_activities/view';
		$this->layout();
	}

	public function edit($id)
	{
		if (!is_client_logged_in()) {
			redirect(site_url('clients/login'));
		}
		$data['types'] = $this->Daily->activities();
		$data['activity'] = $this->Daily->get_via_activity($id);
		$this->data    			= $data;
		$this->view            	= 'daily_activities/edit';
		$this->layout();
	}

	public function edit_data($value='')
	{
		$count = $this->input->post("time_slot");
		if($count == 10)
		{
			$cycle = 1;
		}
		if($count == 20)
		{
			$cycle = 2;
		}
		if($count == 30)
		{
			$cycle = 3;
		}
		if($count == 40)
		{
			$cycle = 4;
		}
		if($count == 50)
		{
			$cycle = 5;
		}
		if($count == 60)
		{
			$cycle = 6;
		}
		$array = array(
			'client_id'=>$this->session->userdata('client_user_id'),
			'a_time'=>$this->input->post("time_slot"),
			'a_type'=>$this->input->post("type"),
			'a_cycles'=>$cycle
		);
		$id = $this->input->post("activity");
		$data = $this->Daily->update_by('a_id', $id, $array);
		if($data)
		{
			$msg = "Activity Updated";
			$this->session->set_flashdata('success',$msg);
			redirect('Daily_Activity/view');
		}
	}

	public function delete($id)
	{
		$data = $this->Daily->delete_by('a_id', $id);
		if($data)
		{
			$msg = "Deleted";
			$this->session->set_flashdata('success',$msg);
			redirect('Daily_Activity/view');
		}
	}


}
?>