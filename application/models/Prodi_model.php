<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi_model extends Main_Model {

	protected $table = "prodi";

	public function all()
	{
		$sql = $this->db->order_by('nama_prodi', 'DESC')->get($this->table);
		return $sql->result();
	}

}

/* End of file Prodi_model.php */
/* Location: ./application/models/Prodi_model.php */