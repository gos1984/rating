<?php 
namespace app\controller;
use core\Controller;
use app\model\Administrator as Model;
use app\view\Administrator as View;

class Administrator extends Controller{
	public function __construct() {
		$this->model = new Model();
		$this->view = new View();
	}

	public function index() {
		if(!empty($_SESSION['admin'])) {
			$data = $this->model->getPageQuests();
			$this->view->output("questions",$data);
		} else {
			$this->view->output("form");
		}
	}

	public function category() {
		$this->verifycation();
		$data = $this->model->getCategory();
		$this->view->output("category",$data);
	}

	public function modal() {
		$this->verifycation();
		$data = $this->model->getModal();
		$this->view->output("modal",$data);
	}

	public function answers() {
		$this->verifycation();
		$data = $this->model->getPageAnswers();
		$this->view->output("answers",$data);
	}

	public function users() {
		$this->verifycation();
		$data = $this->model->getPageUsers();
		$this->view->output("users",$data);
	}

	public function edit() {
		$this->verifycation();
		$path = preg_match('/(modal|category|questions|answers)/',URL, $matches);
		if($path != 0) {
			$type = (string) $matches[1];
			$setter = "set".ucfirst($type);
			$data = $this->model->$setter();
		}
	}

	public function entry() {
		$this->verifycation();
		$data = $this->model->getAdmin();
	}

	public function verifycation() {
		if(empty($_SESSION['admin'])) {
			header("Location: /administrator", true, 301);
			$this->view->output("form");
		}
	}

	public function xls() {
		$this->model->getFile();
	}
}

?>