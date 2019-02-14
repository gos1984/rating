<?php
namespace core;
use PDO;
abstract class Model {
	protected $db;
	protected $user;
	public function __construct() {
		$this->db = DB::getInstance();
		if(!empty($_SESSION['login'])) {
			$this->user = array(
				'login' => 	$_SESSION['login']
			);
		}
	}
}

?>