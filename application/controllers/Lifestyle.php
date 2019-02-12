<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LifeStyle extends Clients_controller
{
	public function __construct()
	{
		parent::__construct();
		
	}

	public function index ($value='')
	{
		if (!is_client_logged_in()) {
			redirect(site_url('clients/login'));
		}
        $this->view            = 'lifestyles';
        $this->layout();
	}

}

?>