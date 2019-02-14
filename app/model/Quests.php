<?php
namespace app\model;
use core\Model;
use core\traits\{Defense,Questions, Answers, Modal,Company,Treatment,Type,Results,ResultsInPDF};
use PDO;
use Mpdf\Mpdf;
class Quests extends Model{
	use Defense,Questions, Answers, Modal,Company,Treatment,Type,Results,ResultsInPDF;
	public function __construct() {
		parent::__construct();
	}

	public function getCommon() {
		$result = $this->db->query("SELECT id FROM result WHERE user = {$_SESSION['id']}");
		if($result->fetch(PDO::FETCH_BOUND)) {
			$quests = Array(
				'results' => $this->getResults($_SESSION['id'])
			);
		} else {
			$quests = Array(
				'company' => $this->getCompany(),
				'treatment' => $this->getTreatment(),
				'type' => $this->getType(),
				'modal' => $this->getModal()
			);
		}
		return $quests;
	}

	public function getJsonQuestions() {
		$quests = $this->getQuestions();
		foreach ($quests as $q => $quest) {
			$quests[$q]['answers'] = $this->getAnswers($q,'question_id');
		}
		$quests = json_encode($quests);
		return $quests;
	}

	public function sendResults() {
		if(!empty($_POST['company'])) {
			$company		= $this->defenseStr($_POST['company']);
			$lastname		= $this->defenseStr($_POST['lastname']);
			$name			= $this->defenseStr($_POST['name']);
			$patron			= $this->defenseStr($_POST['patron']);
			$position		= $this->defenseStr($_POST['position']);
			$city			= $this->defenseStr($_POST['city']);
			$address		= $this->defenseStr($_POST['address']);
			$type_company	= $this->defenseStr($_POST['type_company']);	
			$treatment		= $this->defenseStr($_POST['treatment']);
			$id 			= (int) $_POST['user'];
			$result = Array(
				'modal' => $_POST['modal'],
				'result' => $_POST['quest']
			);
			$resultJson = json_encode($result,JSON_UNESCAPED_UNICODE);
			$this->db->exec("UPDATE user SET
				company = '$company',
				name = '$name',
				lastname = '$lastname',
				patron = '$patron',
				city = '$city',
				address = '$address',
				position = '$position',
				type_company = '$type_company',
				treatment_id = $treatment
				WHERE id = $id");

			$findUserResult = $this->db->query("SELECT user FROM result WHERE user = $id");
			if(!$findUserResult->fetch(PDO::FETCH_BOUND)) {
				$score = $this->getResultScore($result['result']);
				$this->db->exec("INSERT result(user,result,description) VALUES($id,$score,'$resultJson')");
			};
		}
	}

	public function getResultScore($result) {
		$score = 0;
		foreach($result as $key => $val) {
			if(is_array($val)) {
				for($i = 0; $i < count($val); $i++) {
					$score += $this->db->query("SELECT score FROM answer WHERE id = {$val[$i]}")->fetchColumn();
				}
			} else {
				if((int) $val != 0) {
					$score += $this->db->query("SELECT score FROM answer WHERE id = $val")->fetchColumn();
				}
			}
		}
		return $score;
	}

	public function getResultOutputPDF() {
		$data = $this->getResultOutputForPDF($_SESSION['id']);
		$mpdf = new Mpdf();
		ob_start();
		include(ROOT."/app/view/quests/pdf.php");
		$content = ob_get_clean();
		$mpdf->WriteHTML($content);
		$mpdf->Output();
	}
}

?>