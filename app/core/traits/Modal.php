<?php
namespace core\traits;
use PDO;

trait Modal{
	public function getModal(int $id = 0) {
		$where = !empty($id) ? " WHERE id = $id" : "";
		
		$m = $this->db->query("SELECT * FROM modal $where");
		while ($row = $m->fetch(PDO::FETCH_ASSOC)) {
			$modal[$row['id']] = $row['name'];
		}
		return $id > 0 ? $modal[$id] : $modal;
	}
}
?>