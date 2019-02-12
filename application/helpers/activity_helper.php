<?php
	
	function get_via_date($date,$id)
	{
	
		$CI =& get_instance();
        $CI->load->model('Daily_model');
        $data = $CI->Daily_model->data_via_date($date,$id);
        return $data;
	}
 ?>