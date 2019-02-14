<?php
namespace core\traits;
use PDO;
trait Results {
	public function getResults($user = null) {
		if(!empty($user)) {
			$result = $this->db->query("SELECT
				u.company,
				u.name,
				u.lastname,
				u.patron,
				u.city,
				u.address,
				u.position,
				u.email,
				u.type_company,
				u.treatment_id,
				r.result,
				r.description
				FROM result r
				INNER JOIN user u ON u.id = r.user
				WHERE u.id = $user")->fetch(PDO::FETCH_ASSOC);

			return $result;
		}
	}
}
?>