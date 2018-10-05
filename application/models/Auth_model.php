<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends User_model {

	protected $table = "users";

	public function login($credentials)
	{
		$sql = $this->db->get_where($this->table, [
			'username' => $credentials['username']
		]);
		$check = $sql->num_rows();
		if($check > 0) {
			$data = $sql->row();
			$validate = password_verify($credentials['password'], $data->password);
			if($validate === TRUE) {
				$_SESSION['user'] = ((array) $data);
				$this->session->set_userdata("is_logged_in", TRUE);
				$level = ($data->level == 1) ? "admin" : "operator";
				$_SESSION['level'] = $level;
				return true;
			} else {
				return false;
			}
		}
	}

	public function register($data)
	{
		$register = $this->db->insert($this->table, $data);
		return ($register) ? TRUE : FALSE;
	}
	

}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */