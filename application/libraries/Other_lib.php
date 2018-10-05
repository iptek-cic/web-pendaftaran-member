<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Namespace DomPDF
use Dompdf\Dompdf;
use Dompdf\Options;

class Other_lib
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function getTemplates($view)
	{
			
	}

	public function getAdminTemplates($view, $data = [])
	{
		$this->ci->load->view('layouts/header', $data);
		$this->ci->load->view('layouts/navbar');
		$this->ci->load->view('layouts/sidebar');
		$this->ci->load->view($view);
		$this->ci->load->view('layouts/footer');
	}

	public function isLogin()
	{
		if ($this->ci->session->is_logged_in === TRUE) {
			return true;
		} else {
			return false;
		}
	}

	public function showBreadCrumb()
	{
		$total_segment = $this->ci->uri->total_segments();

		$html = "<ol class='breadcrumb'>";
		$html .= "<li><a href='".base_url('dashboard')."'><i class='fa fa-home'></i> Home</a></li>";
		$class = "active";
		for ($i = 1; $i <= $total_segment; $i++) {
			$uri = $this->ci->uri->segment($i);
			$link = str_replace("-", " ", ucfirst($uri));
			if ($i == $total_segment) {
				$html .= "<li class='".$class."'>".$link."</li>";
			} else {
				$html .= "<li><a href='".base_url($uri)."'>".$link."</a></li>";
			}
		}
		$html .= "</ol>";

		return $html;
	}

	public function generatePDF($viewFile, $filename = NULL, $paper = 'Landscape')
	{
		define('DOMPDF_ENABLE_AUTOLOAD', false);
		$options = new Options();
		$options->set('enable_html5_parser', true);
		$options->set('chroot', 'path-to-test-html-files');
		//$options->set('defaultFont', 'Courier');
		
		$pdf = new Dompdf($options);
		//$pdf->set_option('defaultFont', 'Courier');
		$pdf->setPaper('A4', $paper);
	    $pdf->loadHtml($viewFile);
	    $pdf->render();
	    $pdf->stream($filename.'.pdf', ["Attachment"=> 0]);
	    exit(0);
	}

}

/* End of file Other_lib.php */
/* Location: ./application/libraries/Other_lib.php */
