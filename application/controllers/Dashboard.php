<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->other_lib->isLogin()){
			redirect(base_url('login'));
		}
	}

	public function index()
	{
		$prodi = $this->Prodi->all();
		$users = $this->User->all();
		$members = $this->Members->all();
		$data = [
			'prodi' => count((array) $prodi),
			'users' => count((array) $users),
			'members' => count((array) $members),
		];
		$this->other_lib->getAdminTemplates('index', $data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */