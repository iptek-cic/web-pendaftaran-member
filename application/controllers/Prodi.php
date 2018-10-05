<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->other_lib->isLogin()) {
			redirect(linkTo("login"));
		}
	}

	public function index()
	{
		$data = [
			'no' => 1,
			'prodi' => $this->Prodi->all()
		];
		$this->other_lib->getAdminTemplates("prodi/index", $data);
	}

	public function create()
	{
		if (isset($_POST['insert'])) {
			$this->form_validation->set_rules('nama_prodi', 'Nama Progam Studi', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->other_lib->getAdminTemplates("prodi/create");
			} else {
				$data = [
					'nama_prodi' => $this->input->post('nama_prodi', true),
					'keterangan' => $this->input->post('keterangan', true),
				];

				if($this->Prodi->insert($data)) {
					echo "
						<script>
							alert('Data prodi baru berhasil disimpan!');
							window.location='".linkTo('data-prodi')."';
						</script>";
				} else {
					echo "
						<script>
							alert('Oops.. Data prodi baru gagal disimpan!');
							window.location='".linkTo('data-prodi/create')."';
						</script>";
				}
			}
		} else {
			$this->other_lib->getAdminTemplates("prodi/create");
		}
	}

	public function edit($id)
	{
		$data['prodi'] = $this->Prodi->findById($id);
		$this->other_lib->getAdminTemplates("prodi/edit", $data);
	}

	public function update($id)
	{
		$data['prodi'] = $this->Prodi->findById($id);
		if (isset($_POST['update'])) {
			$this->form_validation->set_rules('nama_prodi', 'Nama Progam Studi', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->other_lib->getAdminTemplates("prodi/edit", $data);
			} else {
				$data = [
					'nama_prodi' => $this->input->post('nama_prodi', true),
					'keterangan' => $this->input->post('keterangan', true),
				];

				if($this->Prodi->update($data, $id)) {
					echo "
						<script>
							alert('Data prodi baru berhasil diperbarui!');
							window.location='".linkTo('data-prodi')."';
						</script>";
				} else {
					echo "
						<script>
							alert('Oops.. Data prodi baru gagal diperbarui!');
							window.location='".linkTo('data-prodi')."';
						</script>";
				}
			}
		} else {
			$this->other_lib->getAdminTemplates("prodi/edit", $data);
		}
	}

	public function delete($id)
	{
		if($this->Prodi->delete($id)) {
			echo "
				<script>
					alert('Data prodi baru berhasil dihapus!');
					window.location='".linkTo('data-prodi')."';
				</script>";
		} else {
			echo "
				<script>
					alert('Oops.. Data prodi baru gagal dihapus!');
					window.location='".linkTo('data-prodi')."';
				</script>";
		}
	}

}

/* End of file Prodi.php */
/* Location: ./application/controllers/Prodi.php */