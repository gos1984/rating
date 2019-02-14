<?php
namespace app\controller;
use core\Controller;
use app\model\Quests as model;
use app\view\Quests as view;


class Quests extends Controller{
	public function __construct() {
		if(!empty($_SESSION['login'])) {
			$this->model = new Model();
			$this->view = new View();
		} else {
			header("Location: /", true, 301);
			exit();
		}
	}

	public function index() {
		$data = $this->model->getCommon();
		if(!isset($data['results'])) {
			$this->view->output("index",$data);
		} else {
			$this->view->output("results",$data['results']);
		}
		
	}

	public function show() {
		echo $this->model->getJsonQuestions();
	}

	public function results() {
		$this->model->sendResults();
		$this->pdf();
	}

	public function pdf() {
		$this->model->getResultOutputPDF();
	}
}

?>