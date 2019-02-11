<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Food_Nutrition_model extends CRM_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function insert_data($tbl_name,$array)
	{
		$this->db->insert($tbl_name,$array);
		return true;
	}


	public function get_all_nutritions()
	{
		$this->db->select();
		$this->db->from('food_nutrition_types');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function check($date,$val,$id)
	{
		$this->db->select();
		$this->db->from('food_nutritions');
		$this->db->where("fn_date",$date);
		$this->db->where("fn_type",$val);
		$this->db->where("client_id",$id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_users_data($id)
	{
		$this->db->select("*");
		$this->db->from('food_nutritions');
		$this->db->where("food_nutritions.client_id",$id);
		$this->db->join("tblcontacts","tblcontacts.userid = food_nutritions.client_id");
		$this->db->order_by("food_nutritions.fn_time","ASC");
		$this->db->order_by("food_nutritions.fn_id","DESC");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_data_dates($id)
	{
		$this->db->select();
		$this->db->from('food_nutritions');
		$this->db->where("client_id",$id);
		$this->db->group_by("fn_date");
		$this->db->order_by("fn_date","DESC");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function data_via_date($date,$id)
	{
		
		$this->db->select("*");
		$this->db->from('food_nutritions');
		$this->db->where("client_id",$id);
		$this->db->where("fn_date",$date);
		$this->db->order_by("fn_time","ASC");
		$this->db->order_by("fn_date","DESC");
		$query = $this->db->get();
		return $query->result_array();
	}


	public function edit ($id)
	{
		$this->db->select("*");
		$this->db->from('food_nutritions');
		$this->db->where("fn_id",$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function update_by($column, $row_id, $data) 
	{
		$this->db->where($column, $row_id);
		return $this->db->update('food_nutritions', $data);
	}
	public function delete_by($column, $id) 
	{
		return $this->db->delete('food_nutritions', array($column => $id));
	}

	public function get_data_where($id,$start="",$end="")
	{
		$this->db->select();
		$this->db->from('food_nutritions');
		$this->db->where("client_id",$id);
		$this->db->where("fn_date BETWEEN '$start' AND '$end'");
		$this->db->group_by("fn_date");
		$this->db->order_by("fn_date","DESC");
		$query = $this->db->get();
		return $query->result_array();
	}


}
?>