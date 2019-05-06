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
		$data['header'] = 'home';
		$this->view->output("index",$data);
	}

	public function count() {
		echo $this->model->getQountResult();
	}

	public function total() {
		$data = $this->model->getTotal();
		$data['header'] = 'home';
		if ($data['year'] == 2019) {
$this->view->output("total1",$data); 
} else { 
$this->view->output("total",$data);
}
	}

	public function experts() {
		$data['header'] = 'home';
		$this->view->output("experts",$data);
	}
}

?>