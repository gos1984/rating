<?php
namespace app\controller;
use core\Controller;
use app\model\Account as model;
use app\view\Account as view;


class Account extends Controller{
	public function __construct() {
		$this->model = new Model();
		$this->view = new View();
	}

	public function index() {
		$data = $this->model->getQuestions();
		$this->view->output("index",$data);
	}

	public function registr() {
		$this->model->registr();
	}

	public function forgot() {
		$this->model->forgot();
	}

	public function auth() {
		$this->model->auth();
	}

	public function confirm() {
		$this->model->confirm();
	}

	public function exit() {
		$this->model->exit();
	}

	public function verification() {
		$this->model->verification();
	}

	public function entry() {
		$data = $this->model->entry();
		$this->view->output("entry",$data);
	}
}

?>