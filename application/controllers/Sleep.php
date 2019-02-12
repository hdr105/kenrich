<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sleep extends Clients_controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Sleep_model","Sleep");
		
	}

	public function index ($value='') //add sleep diary view
	{
		
		if (!is_client_logged_in()) {
			redirect(site_url('clients/login'));
		}
		$this->view            	= 'sleeps/add_sleep';
		$this->layout();
	}

	public function add($value='') //add sleep 
	{
		
		$disturbed = $this->input->post("disturbed");
		$power = $this->input->post("power");

		if(isset($disturbed))
		{
			$dis_from = $this->input->post("d_from");
			$dis_to = $this->input->post("d_tw");
			$dis_desp = $this->input->post("desp");
		}

		if(isset($power))
		{
			$pwr_from = $this->input->post("p_from");
			$pwr_to = $this->input->post("p_tw");
		}

		$disturbed_from = $dis_from?$dis_from:"";
		$disturbed_to = $dis_to?$dis_to:"";
		$disturbed_desp = $dis_desp?$dis_desp:"";
		$power_from = $pwr_from?$pwr_from:"";
		$power_to = $pwr_to?$pwr_to:"";

		$array = array(
			'client_id'=>$this->session->userdata('client_user_id'),
			's_from'=>$this->input->post("from"),
			's_to'=>$this->input->post("to"),
			'd_nap_from'=>$disturbed_from,
			'd_nap_to'=>$disturbed_to,
			'd_desp'=>$disturbed_desp,
			'p_nap_from'=>$power_from,
			'p_nap_to'=>$power_to,
			'nap_created_at'=>$this->input->post("date")

		);

		$data = $this->Sleep->insert_data('sleeps',$array);
		if($data)
		{
			$msg = "Sleep Inserted";
			$this->session->set_flashdata('success',$msg);
			redirect('Sleep/view');
		}

	}

	public function view($value='')
	{
		if (!is_client_logged_in()) {
			redirect(site_url('clients/login'));
		}
		$user_id = $this->session->userdata('client_user_id');
		$data['sleeps'] = $this->Sleep->get_all($user_id); 
		$this->data    			= $data;
		$this->view            	= 'sleeps/view_sleep';

		$this->layout();
	}

	public function check($value='') //check food dairy wether today's type is already done or not 
	{
		$date = $_POST['date'];
		$user_id = $this->session->userdata('client_user_id');
		$response = $this->Sleep->check($date,$user_id);
		if($response)
		{
			$response['status'] = true;
			$response['msg'] = 'Already Updated';
		}
		else
		{
			$response['status'] = false;
		}
		echo json_encode($response);
		exit;
	}


	public function edit($id) // edit view
	{
		if (!is_client_logged_in()) {
			redirect(site_url('clients/login'));
		}
		$data['sleep'] 			= $this->Sleep->get_via_id($id);
		$this->data    			= $data;
		$this->view            	= 'sleeps/edit';
		$this->layout();

	}

		public function edit_data($value='') //edit sleep 
		{

			$disturbed = $this->input->post("disturbed");
			$power = $this->input->post("power");
			$pwr_from = "";
			$pwr_to = "";
			$dis_from ="";
			$dis_to ="";
			$dis_desp = "";

			if($disturbed == 1)
			{
				$dis_from = $this->input->post("d_from");
				$dis_to = $this->input->post("d_tw");
				$dis_desp = $this->input->post("desp");
			}

			if($power==1)
			{
				$pwr_from = $this->input->post("p_from");
				$pwr_to = $this->input->post("p_tw");
			}

			$disturbed_from = $dis_from?$dis_from:"";
			$disturbed_to = $dis_to?$dis_to:"";
			$disturbed_desp = $dis_desp?$dis_desp:"";
			$power_from = $pwr_from?$pwr_from:"";
			$power_to = $pwr_to?$pwr_to:"";

			$array = array(
				'client_id'=>$this->session->userdata('client_user_id'),
				's_from'=>$this->input->post("from"),
				's_to'=>$this->input->post("to"),
				'd_nap_from'=>$disturbed_from,
				'd_nap_to'=>$disturbed_to,
				'd_desp'=>$disturbed_desp,
				'p_nap_from'=>$power_from,
				'p_nap_to'=>$power_to,
				'nap_created_at'=>$this->input->post("date")

			);

			$id = $this->input->post("sleep_id");

			$data = $this->Sleep->update_by('s_id', $id, $array);
			if($data)
			{
				$msg = "Sleep Updated";
				$this->session->set_flashdata('success',$msg);
				redirect('Sleep/view');
			}

		}


		public function delete($id)
		{
			$data = $this->Sleep->delete_by('s_id', $id);
			if($data)
			{
				$msg = "Deleted";
				$this->session->set_flashdata('success',$msg);
				redirect('Sleep/view');
			}
		}


	}
	?>