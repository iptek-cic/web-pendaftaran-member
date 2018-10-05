<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public $rules = [
				[
					'field' => 'username',
					'label'	=> 'Username',
					'rules' => 'required'
				],
				[
					'field'	=> 'name',
					'label'	=> 'Nama Lengkap',
					'rules'	=> 'required'
				],
				[
					'field'	=> 'email',
					'label'	=> 'E-mail',
					'rules'	=> 'required'
				],
				[
					'field'	=> 'level',
					'label'	=> 'Level',
					'rules'	=> 'required'
				]
			];

	public function __construct()
	{
		parent::__construct();
		if(!$this->other_lib->isLogin()){
			redirect(base_url('login'));
		} elseif($_SESSION['user']['level'] != 1) {
			redirect(base_url('dashboard'));
		}
	}

	public function index()
	{
		$data = [
			'no'	=> 1,
			'users'	=> $this->User->all(),
		];
		$this->other_lib->getAdminTemplates("user/index", $data);
	}

	public function create()
	{
		if (isset($_POST['insert'])) {
			$rules = $this->rules;
			$rules[] = [
					[
					'field' => 'password',
					'label'	=> 'Password',
					'rules' => 'required'
				]
			];

			$this->form_validation->set_rules($this->rules);
			$this->form_validation->set_error_delimiters("<p class='text-danger'>", "</p>");
			if ($this->form_validation->run() == FALSE) {
				$this->other_lib->getAdminTemplates("user/create");
			} else {
				$post = $this->input->post();
				$data = [
					'username'	=> $post['username'],
					'name'		=> $post['name'],
					'password'	=> password_hash($post['password'], PASSWORD_DEFAULT),
					'email'		=> $post['email'],
					'level'		=> $post['level']
				];

				$insert = $this->User->insert($data);
				if($insert) {
					echo "
						<script>
							alert('Data pengguna baru berhasil disimpan!');
							window.location='".linkTo('manajemen-pengguna')."';
						</script>";
				} else {
					echo "
						<script>
							alert('Oops.. Data pengguna baru gagal disimpan!');
							window.location='".linkTo('manajemen-pengguna/create')."';
						</script>";
				}
			}
		} else {
			$this->other_lib->getAdminTemplates("user/create");
		}
	}

	public function edit($id)
	{
		$data['user'] = $this->User->findById($id);
		$this->other_lib->getAdminTemplates("user/edit", $data);

	}

	public function update($id)
	{
		if (isset($_POST['update'])) {

			$this->form_validation->set_rules($this->rules);
			$this->form_validation->set_error_delimiters("<p class='text-danger'>", "</p>");
			if ($this->form_validation->run() == FALSE) {
				$data['user'] = $this->User->findById($id);
				$this->other_lib->getAdminTemplates("user/edit", $data);
			} else {
				$post = $this->input->post();
				$data = [
					'username'	=> $post['username'],
					'name'		=> $post['name'],
					'email'		=> $post['email'],
					'level'		=> $post['level']
				];

				$update = $this->User->update($data, $id);
				if($update) {
					echo "
						<script>
							alert('Data pengguna berhasil diperbarui!');
							window.location='".linkTo('manajemen-pengguna')."';
						</script>";
				} else {
					echo "
						<script>
							alert('Oops.. Data pengguna baru gagal diperbarui!');
							window.location='".linkTo('manajemen-pengguna/edit/'.$id)."';
						</script>";
				}
			}
		} else {
			redirect(linkTo('manajemen-pengguna'));
		}
	}

	public function delete($id)
	{
		if ($this->User->delete($id)) {
			echo "
				<script>
					alert('Data pengguna berhasil dihapus!');
					window.location='".linkTo('manajemen-pengguna')."';
				</script>";
		} else {
			echo "
				<script>
					alert('Oops.. Data pengguna baru gagal dihapus!');
					window.location='".linkTo('manajemen-pengguna')."';
				</script>";
		}
	}

	public function profile()
	{
		$id = $_SESSION['user']['id'];
		$data['user'] = $this->User->findById($id);
		$this->other_lib->getAdminTemplates("user/profile", $data);
	}

	public function ubah_password()
	{
		$id = $_SESSION['user']['id'];
		$data['id']= $id;
		if(isset($_POST['update'])) {
			$rules = [
				[
					'field'	=> 'password_lama',
					'label'	=> 'Password Lama',
					'rules'	=> 'required'
				],
				[
					'field'	=> 'password_baru',
					'label'	=> 'Password Baru',
					'rules'	=> 'required'
				],
				[
					'field'	=> 'konfirmasi_password',
					'label'	=> 'Konfirmasi Password',
					'rules'	=> 'required'
				]
			];

			$this->form_validation->set_rules($rules);
			$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
			if ($this->form_validation->run() == FALSE) {
				$this->other_lib->getAdminTemplates("user/ubah-password",$data);
			} else {
				$current_pass  = $_SESSION['user']['password'];
				$password_lama = $this->input->post('password_lama');
				$password_baru = $this->input->post('password_baru');
				$konf_password = $this->input->post('konfirmasi_password');

				//Checking password if match with password in db
				if(password_verify($password_lama, $current_pass)) {					

					//Checking new password if match with password confirm
					if($password_baru == $konf_password){
						$password_baru = password_hash($password_baru, PASSWORD_DEFAULT);
						
						if($this->User->update(['password' => $password_baru], $id)) {
							echo "
								<script>
									alert('Password pengguna berhasil diubah!');
									window.location='".linkTo('manajemen-pengguna/profile')."';
								</script>";
						} else {
							echo "
								<script>
									alert('Oops.. Password pengguna baru gagal diubah!');
									window.location='".linkTo('manajemen-pengguna/ubah-password')."';
								</script>";
						}

					} else {
						echo "
							<script>
								alert('Oops.. Password baru tidak sama dengan konfirmas password!');
								window.location='".linkTo('manajemen-pengguna/ubah-password/')."';
							</script>";
					}
				} else {
					echo "
						<script>
							alert('Oops.. Password lama salah!');
							window.location='".linkTo('manajemen-pengguna/ubah-password/')."';
						</script>";
				}
			}
		} else {
			$this->other_lib->getAdminTemplates("user/ubah-password",$data);
		}
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */