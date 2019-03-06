<?php
namespace core\traits;
use PDO;

trait Answers{
	public function getAnswers(int $id = 0, string $type = 'id') {
		$answers = null;
		$where = !empty($id) ? " WHERE $type = $id" : "";
		$a = $this->db->query("SELECT * FROM answer $where");
		while ($row = $a->fetch(PDO::FETCH_ASSOC)) {
			$answers[$row['id']] = Array(
					'name' => $row['name'],
					'question' => $row['question_id'],
					'type' => $row['type'],
					'score' => $row['score'],
					'manager' => $row['manager'],
					'cond' => $row['cond'],
					'dependency' => $row['dependency']
			);
		}
		return $id > 0 && $type == 'id' ? $answers[$id] : $answers;
	}
}

?>