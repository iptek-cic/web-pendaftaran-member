<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {

	private $rules = [
		[
			'field' => 'nama',
			'label' => 'Nama Lengkap',
			'rules'	=> 'required'
		],
		[
			'field' => 'id_prodi',
			'label' => 'Program Study',
			'rules'	=> 'required'
		],
		[
			'field' => 'gugus',
			'label' => 'Gugus',
			'rules'	=> 'required'
		],
		[
			'field' => 'hp',
			'label' => 'No. HP',
			'rules'	=> 'required|numeric'
		],
		[
			'field'	=> 'pilihan_ke',
			'label'	=> 'Pilihan ke',
			'rules' => 'required|numeric'
		]
	];

	public function __construct()
	{
		parent::__construct();
		if(!$this->other_lib->isLogin()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = [
			'no' => 1,
			'members' => $this->Members->all()
		];

		$this->other_lib->getAdminTemplates("members/index", $data);
	}

	public function create()
	{
		$data = [
			'gugus' => listGugus(),
			'prodi' => $this->Prodi->all()
		];

		if(isset($_POST['insert'])) {
			$this->form_validation->set_rules($this->rules);
			if ($this->form_validation->run() == FALSE) {
				$this->other_lib->getAdminTemplates("members/create", $data);
			} else {
				$data = [
					'nama'	=> $this->input->post('nama', true),
					'id_prodi' => $this->input->post('id_prodi', true),
					'gugus' => $this->input->post('gugus', true),
					'hp' => $this->input->post('hp', true),
					'pilihan_ke' => $this->input->post('pilihan_ke', true)
				];

				if($this->Members->insert($data)) {
					echo "
						<script>
							alert('Data member baru berhasil disimpan!');
							window.location='".linkTo('data-member')."';
						</script>";
				} else {
					echo "
						<script>
							alert('Oops.. Data member baru gagal disimpan!');
							window.location='".linkTo('data-member')."';
						</script>";
				}
			}
		} else {
			$this->other_lib->getAdminTemplates("members/create", $data);
		}
	}

	public function edit($id)
	{
		$data = [
			'member' => $this->Members->findById($id),
			'prodi'	 => $this->Prodi->all(),
			'gugus'	 => listGugus(),
		];

		$this->other_lib->getAdminTemplates("members/edit", $data);
	}

	public function update($id)
	{
		$data = [
			'member' => $this->Members->findById($id),
			'prodi'	 => $this->Prodi->all(),
			'gugus'	 => listGugus(),
		];

		if(isset($_POST['update'])) {
			$this->form_validation->set_rules($this->rules);
			if ($this->form_validation->run() == FALSE) {
				$this->other_lib->getAdminTemplates("members/edit", $data);
			} else {
				$data = [
					'nama'	=> $this->input->post('nama', true),
					'id_prodi' => $this->input->post('id_prodi', true),
					'gugus' => $this->input->post('gugus', true),
					'hp' => $this->input->post('hp', true),
					'pilihan_ke' => $this->input->post('pilihan_ke', true)
				];

				if($this->Members->update($data, $id)) {
					echo "
						<script>
							alert('Data member baru berhasil diperbarui!');
							window.location='".linkTo('data-member')."';
						</script>";
				} else {
					echo "
						<script>
							alert('Oops.. Data member baru gagal diperbarui!');
							window.location='".linkTo('data-member')."';
						</script>";
				}
			}
		} else {
			$this->other_lib->getAdminTemplates("members/edit", $data);
		}
	}

	public function delete($id)
	{
		if($this->Members->delete($id)) {
			echo "
				<script>
					alert('Data member baru berhasil dihapus!');
					window.location='".linkTo('data-member')."';
				</script>";
		} else {
			echo "
				<script>
					alert('Oops.. Data member baru gagal dihapus!');
					window.location='".linkTo('data-member')."';
				</script>";
		}
	}
}

/* End of file Members.php */
/* Location: ./application/controllers/Members.php */