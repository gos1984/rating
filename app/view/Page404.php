<?php
namespace app\view;
use core\View;

class Page404 extends View{
	public function output($action, $data = null) {
		require_once ROOT."/app/view/404/index.php";
	}

}
?>