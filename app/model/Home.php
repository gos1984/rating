<?php
namespace app\model;
use core\Model;
use core\traits\{Company,Modal};
use PDO;

class Home extends Model{
	use Company,Modal;
	public function __construct() {
		parent::__construct();
	}

	public function getQountResult() {
		$count = $this->db->query("SELECT count(id) FROM result")->fetchColumn();
		return $count;
	}

	public function getTotal() {
		$path = preg_match('/(\d{4})/',URL, $matches);

		if($path != 0) {
			$year = (int) $matches[0];
			$total['modal'] = $this->getModal();
			$total['company'] = $this->getCompany();
			$total['score'] = $this->db->query("SELECT score FROM total WHERE year = $year")->fetchColumn();
			$t = $this->db->query("SELECT * FROM total_description WHERE year = $year");
			while($row = $t->fetch(PDO::FETCH_ASSOC)) {
				$total['description'][] = $row;
			}
			return $total;
		}
	}
}
?>