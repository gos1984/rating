<?php
namespace core;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PDO;
class XLS{
	private $title;
	private $data;
	private $xls;
	private $sheet;

	public function __construct($title) {
		$this->sheet = new Spreadsheet();
		$this->title = $title;
	}

	public function getOnloadCSVResult($data,$direct_list,$quest_list) {
		$activeSheet = $this->sheet->getActiveSheet();
		$c = 1;
		foreach ($this->title as $key => $value) {
			$activeSheet->setCellValueByColumnAndRow($c++,1,$value);
		}

		$r = 2;
		for($i = 0; $i < count($data); $i++) {
			$c = 1;
			foreach ($this->title as $key => $value) {
				if($key == 'description') {
					$modal = json_decode($data[$i][$key], true);
					for($m = 0; $m < count($modal['modal']); $m++) {
						$modal['modal'][$m] = $direct_list[$modal['modal'][$m]];
					}
					$data[$i][$key] = implode(',', $modal['modal']);
				}
				$activeSheet->setCellValueByColumnAndRow($c++,$r,$data[$i][$key]);
			}
			$r++;
		}
	}

	function __destruct() {
		header ( "Expires: Mon, 1 Apr 1974 05:00:00 GMT" );
		header ( "Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT" );
		header ( "Cache-Control: no-cache, must-revalidate" );
		header ( "Pragma: no-cache" );
		header ( "Content-type: application/vnd.ms-excel" );
		header ( "Content-Disposition: attachment; filename=results.xls" );
		$objWriter = new Xlsx($this->sheet);
		$objWriter->save('php://output');
	}

}

?>