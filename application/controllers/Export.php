<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Load PHPExcel as thirdparty
require_once(APPPATH."/third_party/PHPExcel.php");

class Export extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->other_lib->isLogin()){
			redirect(linkTo("login"));
		}
	}

	public function memberPDF()
	{
		$date = date('Y-m-d H:i');
		$data = [
			'no' => 1,
			'members' => $this->Members->all(),
			'date' => $date
		];
		$html = $this->load->view('export/members', $data, TRUE);
		$this->other_lib->generatePDF($html, "Data Member baru UKM IPTEK CIC $date", 'Potrait');
	}

	public function memberExcel()
	{
		$filename = "DATA MEMBER UKM IPTEK CIC ".date('Y');
		$objPHPExcel = new PHPExcel();
		$activeSheet = $objPHPExcel->getActiveSheet();
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->setTitle($filename);

		//Formating MergeCells
		$activeSheet->mergeCells('A1:G2');

		//Style center
		$centerAlign = array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
			);

		$activeSheet->getStyle('A1')->getAlignment()->applyFromArray($centerAlign);
		$activeSheet->getStyle('A4:G4')->getAlignment()->applyFromArray($centerAlign);
		//$activeSheet->getStyle('D:I')->getAlignment()->applyFromArray($centerAlign);
		$activeSheet->getStyle('A')->getAlignment()->applyFromArray($centerAlign);

		//Color bg and text
		$activeSheet->getStyle('A4:G4')
					->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
					->getStartColor()
					->setARGB('0000AEEF');
		
		$activeSheet->getStyle('A4:G4')
					->getFont()
					->getColor()
					->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

		//Height and Width
		/* Height */
		$activeSheet->getRowDimension('4')->setRowHeight(30);
		
		/* Width */
		$activeSheet->getColumnDimension('A')->setWidth(5);
		$activeSheet->getColumnDimension('B')->setWidth(16.5);
		$activeSheet->getColumnDimension('C')->setAutoSize(true);
		$activeSheet->getColumnDimension('D')->setWidth(15);
		$activeSheet->getColumnDimension('E')->setWidth(15);
		$activeSheet->getColumnDimension('F')->setWidth(10);
		$activeSheet->getColumnDimension('G')->setWidth(15);

		//Style Font
		$activeSheet->getStyle('A1')->getFont()->setSize(14)->setBold(true);
		$activeSheet->getStyle('A4:G4')->getFont()->setBold(true);

		//Value of cell
		$activeSheet->setCellValue('A1', $filename);

		//Value table
		$activeSheet->setCellValue('A4', "No.");
		$activeSheet->setCellValue('B4', "Nama Lengkap");
		$activeSheet->setCellValue('C4', "Program Studi");
		$activeSheet->setCellValue('D4', "Gugus");
		$activeSheet->setCellValue('E4', "No. HP");
		$activeSheet->setCellValue('F4', "Pilihan Ke");
		$activeSheet->setCellValue('G4', "Keterangan");

		//Count Total daata
		$data = $this->Members->all();
		$total_count = count((array) $data);
		$total_row = 5+$total_count;
		$no = 1;

		/* Start Looping data from database! */
		$i = 5;
		for ($j=0; $j < $total_count; $j++) {
			$pilihan_ke = ($data[$j]->pilihan_ke == 1) ? "Satu" : "Dua";

			$activeSheet->setCellValue('A'.$i, $no++);
			$activeSheet->setCellValue('B'.$i, $data[$j]->nama);
			$activeSheet->setCellValue('C'.$i, $data[$j]->prodi);
			$activeSheet->setCellValue('D'.$i, $data[$j]->gugus);
			$activeSheet->setCellValue('E'.$i, $data[$j]->hp);
			$activeSheet->setCellValue('F'.$i, $pilihan_ke);
			$activeSheet->setCellValue('G'.$i, '');
			$activeSheet->getStyle('F'.$i)->getAlignment()->applyFromArray($centerAlign);

			$i++;
		}

		$activeSheet->getPageSetup()
					->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
		$activeSheet->getPageSetup()
					->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);

		/* Border Style */
		$arrayStyle = array(
			'borders' => array(
				'outline' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN,
					'color' => array('rgb'=>'000000')
				),
				'top' =>  array(
					'style' => PHPExcel_Style_Border::BORDER_THIN,
					'color' => array('rgb'=>'000000')
				),
				'bottom' =>  array(
					'style' => PHPExcel_Style_Border::BORDER_THIN,
					'color' => array('rgb'=>'000000')
				),
				'left' =>  array(
					'style' => PHPExcel_Style_Border::BORDER_THIN,
					'color' => array('rgb'=>'000000')
				),
				'right' =>  array(
					'style' => PHPExcel_Style_Border::BORDER_THIN,
					'color' => array('rgb'=>'000000')
				),
				'vertical' =>  array(
					'style' => PHPExcel_Style_Border::BORDER_THIN,
					'color' => array('rgb'=>'000000')
				),
				'horizontal' =>  array(
					'style' => PHPExcel_Style_Border::BORDER_THIN,
					'color' => array('rgb'=>'000000')
				),
				'allborders' =>  array(
					'style' => PHPExcel_Style_Border::BORDER_THIN,
					'color' => array('rgb'=>'000000')
				),
			)
		);

		$i = $i-1;
		$activeSheet->getStyle('A4:G'.$i)->applyFromArray($arrayStyle);

		/*//*/
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); 
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        //ubah nama file saat diunduh
        header("Content-Disposition: attachment;filename='".$filename.".xlsx");
        //unduh file
        $objWriter->save("php://output");
        //*/
	}
}

/* End of file Export.php */
/* Location: ./application/controllers/Export.php */