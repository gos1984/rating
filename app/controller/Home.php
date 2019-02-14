<?php 
namespace app\controller;
use core\Controller;
use app\model\Home as Model;
use app\view\Home as View;

class Home extends Controller{
	public function __construct() {
		$this->model = new Model();
		$this->view = new View();
	}

	public function index() {
		$this->view->output("index");
	}
}

?>