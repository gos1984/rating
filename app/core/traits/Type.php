<?php
namespace core\traits;
use PDO;

trait Type{
	public function getType() {
		$t = $this->db->query("SELECT * FROM type");
		while ($row = $t->fetch(PDO::FETCH_ASSOC)) {
			$type[] = $row['name'];
		}
		return $type;
	}
}

?>