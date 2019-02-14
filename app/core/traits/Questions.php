<?php
namespace core\traits;
use PDO;

trait Questions{
	public function getQuestions(int $id = 0, string $type = 'id') {
		$quests = null;
		if($type == 'cat') {
			$type = 'category';
		}

		$where = !empty($id) ? " WHERE $type = $id" : "";
		$q = $this->db->query("SELECT * FROM question $where");
		while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
			$quests[$row['id']] = Array(
					'name' => $row['name'],
					'modal' => $row['modal'],
					'category' => $row['category'],
					'num' => $row['num']
			);
		}
		return $id > 0 && $type == 'id' ? $quests[$id] : $quests;
	}
}

?>