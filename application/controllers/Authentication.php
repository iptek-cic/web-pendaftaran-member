<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->other_lib->isLogin()) {
			redirect(base_url('dashboard'));
		}
		if (isset($_POST['login'])) {
			$rules = [
				[
					'field' => 'username',
					'label'	=> 'Username',
					'rules' => 'required'
				],
				[
					'field' => 'password',
					'label'	=> 'Password',
					'rules' => 'required'
				]
			];
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('auth/login');
			} else {
				$data = [
					'username'	=> $this->input->post('username', true),
					'password'	=> $this->input->post('password', true)
				];
				if ($this->Auth->login($data)) {
					redirect(base_url('dashboard'));
				} else {
					$this->session->set_flashdata('msg', 'Oops! Username atau Password Anda salah!');
					redirect(base_url('login'));
				}
			}
		} else {
			$this->load->view('auth/login');
		}
	}

	public function register()
	{
		if ($this->other_lib->isLogin()) {
			redirect(base_url('dashboard'));
		}

		if (isset($_POST['register'])) {
			$rules = [
				[
					'field' => 'name',
					'label'	=> 'Fullname',
					'rules' => 'required'
				],
				[
					'field' => 'username',
					'label'	=> 'Username',
					'rules' => 'required|is_unique[users.username]'
				],
				[
					'field' => 'email',
					'label'	=> 'E-mail',
					'rules' => 'required|is_unique[users.email]'
				],
				[
					'field' => 'password',
					'label'	=> 'Password',
					'rules' => 'required'
				],
				[
					'field' => 'confirm_password',
					'label'	=> 'Confirmation Password',
					'rules' => 'required'
				]
			];
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('auth/register');
			} else {
				$post = $this->input->post();
				$data = [
					'name'		=> $post['name'],
					'username'	=> $post['username'],
					'password'	=> password_hash($post['password'], PASSWORD_DEFAULT),
					'email'		=> $post['email'],
				];

				$picture = $_FILES['picture'];
				if(!empty($picture['name'])) {
					$config['upload_path'] = './uploads/users/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['encrypt_name'] = true;

					$this->load->library('upload', $config);
					
					if ( ! $this->upload->do_upload('picture')){
						$error = array('error' => $this->upload->display_errors());
					}
					else{
						$upload_data = $this->upload->data();
					}
					$data['picture'] = $upload_data['file_name'];
				}

				if ($this->Auth->register($data)) {
					echo "
						<script>
							alert('Yosh! Proses registrasi berhasil!');
							window.location='".linkTo('login')."';
						</script>";
				} else {
					echo "
						<script>
							alert('Oops! Proses registrasi gagal!');
						</script>";
				}
			}
		} else {
			$this->load->view('auth/register');
		}
	}

	public function logout()
	{
		if (isset($_POST['logout'])) {
			$this->session->sess_destroy();
			redirect(base_url('login'));
		} else {
			redirect(base_url('dashboard'));
		}
	}

}

/* End of file Authentication.php */
/* Location: ./application/controllers/Authentication.php */