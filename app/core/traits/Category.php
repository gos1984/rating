<?php
namespace core\traits;
use PDO;

trait Category{
	public function getCategory(int $id = 0) {
		$id = !empty($id) ? " WHERE id = $id" : "";
		
		$c = $this->db->query("SELECT * FROM category $id");
		while ($row = $c->fetch(PDO::FETCH_ASSOC)) {
			$category[$row['id']] = $row['name'];
		}
		return $category;
	}
}

?>