<?php
namespace app\view;
use core\View;

class Quests extends View{
	public function output($action, $data = null) {
		require_once ROOT."/app/template/header.php";
		require_once ROOT."/app/view/quests/$action.php";
		require_once ROOT."/app/template/footer.php";
	}
}

?>