<?php
namespace app\model;
use core\Model;

class Page404 extends Model {
	public function __construct() {
		parent::__construct();
	}
	public function getIndex() {
		header("refresh:5;url=/");
	}
}

?>