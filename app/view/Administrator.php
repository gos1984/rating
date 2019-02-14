<?php
namespace app\view;
use core\View;

class Administrator extends View{
	public function output($action, $data = null) {
		require_once ROOT."/app/template/header-admin.php";
		require_once ROOT."/app/view/administrator/index.php";
		require_once ROOT."/app/template/footer.php";
	}
}
?>