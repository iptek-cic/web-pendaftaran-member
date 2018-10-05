<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members_model extends Main_Model {

	protected $table = "members";

	public function all()
	{
		$sql =  $this->db->select('members.*, prodi.nama_prodi as prodi')
					 ->from($this->table)->join('prodi', 'members.id_prodi = prodi.id')
					 ->order_by('pilihan_ke', 'ASC')
					 ->get();
		return $sql->result();
	}

}

/* End of file Members_model.php */
/* Location: ./application/models/Members_model.php */