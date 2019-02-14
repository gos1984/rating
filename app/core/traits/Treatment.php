<?php
namespace core\traits;
use PDO;

trait Treatment{
	public function getTreatment(int $id = 0) {
		$where = !empty($id) ? " WHERE id = $id" : "";
		
		$c = $this->db->query("SELECT * FROM treatment $where");
		while ($row = $c->fetch(PDO::FETCH_ASSOC)) {
			$treatment[$row['id']] = $row['type'];
		}
		return $id > 0 ? $treatment[$id] : $treatment;
	}
}

?>