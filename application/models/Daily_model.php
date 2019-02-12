<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Daily_model extends CRM_Model
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

	public function activities($value='')
	{
		$this->db->select();
		$this->db->from("activities_types");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_via_id($id)
	{
		$this->db->select();
		$this->db->from("activities");
		$this->db->where("client_id",$id);
		$this->db->order_by("a_id","DESC");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_data_dates($id)
	{
		$this->db->select("*");
		$this->db->from('activities');
		$this->db->where("client_id",$id);
		$this->db->order_by("a_created_at","DESC");
		$this->db->group_by("a_created_at");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function data_via_date($date,$id)
	{
		
		$this->db->select("*");
		$this->db->from('activities');
		$this->db->where("client_id",$id);
		$this->db->where("a_created_at",$date);
		$this->db->order_by("a_time","ASC");
		$this->db->order_by("a_created_at","DESC");
		$query = $this->db->get();
		return $query->result_array();
	}


	public function update_by($column, $row_id, $data) 
	{
		$this->db->where($column, $row_id);
		return $this->db->update('activities', $data);
	}
	
	public function delete_by($column, $id) 
	{
		return $this->db->delete('activities', array($column => $id));
	}

	public function get_via_activity($id)
	{
		$this->db->select();
		$this->db->from("activities");
		$this->db->where("a_id",$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_data_where($id,$start="",$end="")
	{
		$this->db->select();
		$this->db->from('activities');
		$this->db->where("client_id",$id);
		$this->db->where("a_created_at BETWEEN '$start' AND '$end'");
		$this->db->order_by("a_created_at","DESC");
		$query = $this->db->get();
		return $query->result_array();
	}

}
?>