<?php
namespace core\traits;
use PDO;
use Mpdf\Mpdf;
trait ResultsInPDF {
	public function getResultOutputForPDF($id) {
		$data = $this->getResults($id);

		if(!empty($data)) {
			$data['description'] = json_decode($data['description'],true);

			$data['company'] = $this->getCompany($data['type_company']);
			$data['treatment'] = $this->getTreatment($data['treatment_id']);

			for($i=0; $i<count($data['description']['modal']); $i++) {
				$data['description']['modal'][$i] = $this->getModal($data['description']['modal'][$i]);
			}
			foreach($data['description']['result'] as $key => $val) {
				$data['questions'][$key] = $this->getQuestions($key);

				$answersInQuestion = $this->getAnswers($key,'question_id');


				foreach ($answersInQuestion as $a => $answer) {
					switch($answer['type']) {
						case "radio" : 
						$answerInput = $this->getAnswers($val);
						$data['questions'][$key]['answers'][$val] = Array(
							'type' 	=> $answerInput['type'],
							'name' 	=> $answerInput['name'],
							'score' => $answerInput['score']
						);
						break;
						case "checkbox" : 
						for($i = 0; $i < count($val); $i++) {
							$answerInput = $this->getAnswers($val[$i]);
							$data['questions'][$key]['answers'][$val[$i]] = Array(
								'type' 	=> $answerInput['type'],
								'name' 	=> $answerInput['name'],
								'score' => $answerInput['score']
							);
						}
						break;
						default:
						$data['questions'][$key]['answers'][$a] = Array(
							'name' => $val
						);
						break;

					}
				}

			}
		}
		return $data;
	}
}

?>