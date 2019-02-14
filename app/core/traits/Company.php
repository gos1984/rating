<?php
namespace core\traits;
use PDO;

trait Company{
	public function getCompany(int $id = 0) {
		$where = !empty($id) ? " WHERE id = $id" : "";
		
		$c = $this->db->query("SELECT * FROM company $where");
		while ($row = $c->fetch(PDO::FETCH_ASSOC)) {
			$company[$row['id']] = $row['type'];
		}
		return $id > 0 ? $company[$id] : $company;
	}
}

?>