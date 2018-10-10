<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Sleep_model extends CRM_Model
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

	public function get_all($id)
	{
		$this->db->select("*");
		$this->db->from("sleeps");
		$this->db->where("client_id",$id);
		$this->db->order_by("nap_created_at","DESC");
		$query = $this->db->get();
		return $query->result_array();
	}


	public function update_by($column, $row_id, $data) 
	{
		$this->db->where($column, $row_id);
		return $this->db->update('sleeps', $data);
	}
	
	public function delete_by($column, $id) 
	{
		return $this->db->delete('sleeps', array($column => $id));
	}
	public function check($date,$id)
	{
		$this->db->select();
		$this->db->from('sleeps');
		$this->db->where("nap_created_at",$date);
		$this->db->where("client_id",$id);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_data_dates($id)
	{
		$this->db->select();
		$this->db->from('sleeps');
		$this->db->where("client_id",$id);
		$this->db->order_by("nap_created_at","DESC");
		$query = $this->db->get();
		return $query->result_array();
	}


	public function get_via_id($id)
	{
		$this->db->select();
		$this->db->from('sleeps');
		$this->db->where("s_id",$id);
		$query = $this->db->get();
		return $query->row();
	}


}
?>