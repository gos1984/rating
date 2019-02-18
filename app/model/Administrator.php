<?php
namespace app\model;
use core\Model;
use PDO;
use Mpdf\Mpdf;
use core\traits\{Questions,Category,Modal,Treatment,Company,Type,Defense,Answers,Results,ResultsInPDF};

class Administrator extends Model{
	use Questions,Category,Modal,Treatment,Company,Type,Defense,Answers,Results,ResultsInPDF;

	public function __construct() {
		parent::__construct();
	}

	public function getAdmin() {
		header("Location: ".$_SERVER['HTTP_REFERER']);
		$login = $this->defenseStr($_POST['email']);
		$password = $this->defenseStr($_POST['password']);
		$admin = $this->db->query("SELECT * FROM admin WHERE email = '$login'")->fetch(PDO::FETCH_ASSOC);
		if(password_verify($password,$admin['password'])) {
			$_SESSION = Array(
				'admin' => $admin['name'],
				'position' => $admin['position'],
				'email' => $admin['email'],
			);
		}
		exit();
	}

	public function getPageQuests() {
		$id = 0;
		$type = 'id';
		$path = preg_match('/(cat)\/(\d{1,})/',URL, $matches);
		if($path != 0) {
			$id = (int) $matches[2];
			$type = (string) $matches[1];
		}
		$data = Array(
			'category' => $this->getCategory(),
			'modal' => $this->getModal(),
			'questions' => $this->getQuestions($id,$type),
			'type' => $this->getType(),
			'id' => $id
		);
		return $data;
	}

	public function getPageAnswers() {
		$id = 0;
		$type = 'question_id';
		$path = preg_match('/\/(\d{1,})/',URL, $matches);
		if($path != 0) {
			$id = (int) $matches[1];
		}
		$data = Array(
			'questions' => $this->getQuestions(),
			'answers' => $this->getAnswers($id,$type),
			'type' => $this->getType(),
			'id' => $id
		);
		return $data;
	}

	public function getPageUsers() {

		$path = preg_match('/\/(\d{1,})/',URL, $matches);
		if($path != 0) {
			$id = (int) $matches[1];
			$this->getResultOutputPDF($id);
		}
		$u = $this->db->query("SELECT
			u.id,
			u.company,
			u.name,
			u.lastname,
			u.patron,
			u.city,
			u.address,
			u.position,
			u.email,
			c.type AS type_company,
			t.type AS treatment,
			r.result AS result,
			r.id AS result_id
			FROM result r
			LEFT JOIN user u ON u.id = r.user
			INNER JOIN company c ON u.type_company = c.id
			INNER JOIN treatment t ON u.treatment_id = t.id");
		while ($row = $u->fetch(PDO::FETCH_ASSOC)) {
			$users[$row['id']] = Array(
				'company' => $row['company'],
				'name' => $row['name'],
				'lastname' => $row['lastname'],
				'patron' => $row['patron'],
				'city' => $row['city'],
				'address' => $row['address'],
				'position' => $row['position'],
				'email' => $row['email'],
				'type_company' => $row['type_company'],
				'treatment' => $row['treatment'],
				'result' => $row['result'],
				'result_id' => $row['result_id']
			);
		}
		return isset($users) ? $users : null;
	}

	public function setModal() {
		header("Location: ".$_SERVER['HTTP_REFERER']);
		switch($_GET['action']) {
			case 'edit':
			$id 	= (int) $_POST['id'];
			$name 	= (string) $_POST['name'];
			$edit = $this->db->exec("UPDATE modal SET name = '$name' WHERE id = $id");
			return $edit;
			break;
			case 'add':
			$name 	= (string) $_POST['name'];
			$add = $this->db->exec("INSERT INTO modal(name) VALUES('$name')");
			return $add;
			break;
			case 'remove':
			$id 	= (int) $_GET['id'];
			$remove = $this->db->exec("DELETE FROM modal WHERE id = $id");
			return $remove;
			break;
		}
		exit();
	}

	public function setCategory() {
		header("Location: ".$_SERVER['HTTP_REFERER']);
		switch($_GET['action']) {
			case 'edit':
			$id 	= (int) $_POST['id'];
			$name 	= (string) $_POST['name'];
			$edit = $this->db->exec("UPDATE category SET name = '$name' WHERE id = $id");
			return $edit;
			break;
			case 'add':
			$name 	= (string) $_POST['name'];
			$add = $this->db->exec("INSERT INTO category(name) VALUES('$name')");
			return $add;
			break;
			case 'remove':
			$id 	= (int) $_GET['id'];
			$remove = $this->db->exec("DELETE FROM category WHERE id = $id");
			return $remove;
			break;
		}
		exit();
	}

	public function setQuestions() {
		header("Location: ".$_SERVER['HTTP_REFERER']);
		switch($_GET['action']) {
			case 'edit':
			$id 	= (int) $_POST['id'];
			$name 	= (string) $_POST['name'];
			$modal 	= (int) $_POST['modal'] == 0 ? 'NULL' : (int) $_POST['modal'];
			$category 	= (int) $_POST['category'] == 0 ? 'NULL' : (int) $_POST['category'];
			$edit = $this->db->exec("UPDATE question SET name = '$name', modal = $modal, category = $category WHERE id = $id");
			return $edit;
			break;
			case 'add':
			$name 	= (string) $_POST['name'];
			$modal 	= (int) $_POST['modal'];
			$category 	= (int) $_POST['category'];
			$add = $this->db->exec("INSERT INTO question(name,modal,category) VALUES('$name',$modal,$category)");
			return $add;
			break;
			case 'remove':
			$id 	= (int) $_GET['id'];
			$remove = $this->db->exec("DELETE FROM question WHERE id = $id");
			return $remove;
			break;
		}
		exit();
	}

	public function setAnswers() {
		header("Location: ".$_SERVER['HTTP_REFERER']);
		$id 		= (int) $_POST['id'];
		$name 		= !empty($_POST['name']) ? (string) $_POST['name'] : 'NULL';
		$question 	= (int) $_POST['question'] == 0 ? 'NULL' : (int) $_POST['question'];
		$type 		= !empty($_POST['type']) ? $_POST['type'] : 'NULL' ;
		$score 		= !empty($_POST['score']) ? $_POST['score'] : 0;
		$manager 		= !empty($_POST['manager']) ? $_POST['manager'] : 'NULL';
		$cond 		= !empty($_POST['cond']) ? $_POST['cond'] : 'NULL';
		switch($_GET['action']) {
			case 'edit':
			
			$edit 		= $this->db->exec("UPDATE answer SET name = '$name', question_id = $question, type = '$type', score = $score, manager = $manager, cond = $cond WHERE id = $id");
			return $edit;
			break;
			case 'add':
			$add = $this->db->exec("INSERT INTO answer(name,question_id,type,score,manager, cond) VALUES('$name',$question,'$type',$score,$manager, $cond)");
			return $add;
			break;
			case 'remove':
			$id 	= (int) $_GET['id'];
			$remove = $this->db->exec("DELETE FROM answer WHERE id = $id");
			return $remove;
			break;
		}
		exit();
	}

	public function getResultOutputPDF($id) {
			$data = $this->getResultOutputForPDF($id);
			$mpdf = new Mpdf();
			ob_start();
			include(ROOT."/app/view/quests/pdf.php");
			$content = ob_get_clean();
			$mpdf->WriteHTML($content);
			$mpdf->Output();
	}

}
?>