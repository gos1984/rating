<?php
namespace app\view;
use core\View;

class Account extends View{
	public function output($action, $data = null) {
		require_once ROOT."/app/template/header.php";
		require_once ROOT."/app/view/account/$action.php";
		require_once ROOT."/app/template/footer.php";
	}
}

?>