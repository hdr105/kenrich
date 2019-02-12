<?php
	
	function get_data_via_date($date,$id)
	{
	
		$CI =& get_instance();
        $CI->load->model('Food_Nutrition_model');
        $data = $CI->Food_Nutrition_model->data_via_date($date,$id);
        return $data;
	}
 ?>