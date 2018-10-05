<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {

	protected $table;

	public function all()
	{
		$sql = $this->db->get($this->table);
		return $sql->result();
	}
	
	public function findById($uid)
	{
		$sql = $this->db->get_where($this->table, ['id' => $uid]);
		if($sql->num_rows() > 0) {
			return $sql->row();
		}
	}

	public function first()
	{
		$sql = $this->db->get($this->table);
		return $sql->row();
	}

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function update($data, $id)
	{
		$update = $this->db->where('id', $id)->update($this->table, $data);
		return $update;
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($this->table);
	}

	public function select($column, $id = NULL)
	{
		$this->db->select($column)->from($this->table);
		if($id != NULL) {
			$sql = $this->db->where('id', $id)->get();
		} else {
			$sql = $this->db->get();
		}

		return $sql->result();
	}

}

/* End of file Main_model.php */
/* Location: ./application/models/Main_model.php */