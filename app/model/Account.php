<?php
namespace app\model;
use core\{Model, Mailer};
use core\traits\{Defense,Questions};
use PDO;

class Account extends Model{
	use Defense,Questions;
	public function __construct() {
		parent::__construct();
	}

	public function auth() {
		if(!empty($_POST)) {
			$email  = $this->defenseStr($_POST['email']);
			$password = $this->defenseStr($_POST['password']);
			if($this->verification('auth',$email,$password)) {
				$user = $this->db->query("SELECT * FROM user WHERE email = '$email'")->fetch(PDO::FETCH_ASSOC);
				$_SESSION = Array(
					'id' => $user['id'],
					'login' => $user['email']
				);
			}
		} else {
			header("Location: /", true, 301);
			exit();
		}
	}

	public function registr() {
		if(!empty($_POST)) {
			$email  = $this->defenseStr($_POST['email']);
			$password = $this->defenseStr($_POST['password']);
			$passwordRepeat = $this->defenseStr($_POST['password-repeat']);

			if($this->verification('registr',$email,$password,$passwordRepeat)) {
				$password = password_hash($password,PASSWORD_DEFAULT);
				$ip = $_SERVER['REMOTE_ADDR'];
				$registr = $this->db->exec("INSERT INTO user(email,password,ip,active) VALUES('$email','$password','$ip',0)");
				$mail = new Mailer();
				$mail->sendConfirm($this->db->lastInsertId(),$email);
				$result = Array(
					"success" => "Регистрация прошла успешно!<br/>На ваш email отправлено письмо с подтверждением учётной записи."
				);
				echo json_encode($result);
			}
		}
	}

	public function confirm() {
		$id  = (int) $_GET['id'];
		$email = $this->defenseStr($_GET['email']);
		$user = $this->db->query("SELECT email FROM user WHERE id = '$id'")->fetchColumn();
		if($user == $email) {
			header("Location: /entry", true, 301);
			$this->db->exec("UPDATE user SET active = 1 WHERE id = $id");
			$_SESSION['confirm'] = true;
			exit();
		}
	}

	public function forgot() {
		$email = $this->defenseStr($_POST['email']);
		$user = $this->db->query("SELECT id FROM user WHERE email = '$email'")->fetchColumn();
		if(!$user) {
			$result = Array(
				"error" => "Пользователя с таким email не существует, пройдите регистрацию."
			);
			echo json_encode($result);
			return $user;
		} else {
			$mail = new Mailer();
			$mail->sendForgot($user,$email);
			$result = Array(
				"success" => "Ссылка на восстановление пароля отправлена вам на электронную почту."
			);
			echo json_encode($result);
			return $user;
		}
	}

	public function password() {
		if(!empty($_POST)) {
			$id  = (int) $_POST['id'];
			$email  = $this->defenseStr($_POST['email']);
			$password = $this->defenseStr($_POST['password']);
			$passwordRepeat = $this->defenseStr($_POST['password-repeat']);
			if($password != $passwordRepeat) {
				$result = Array(
					"error" => "Пароли не совпадают."
				);
				echo json_encode($result);
				return false;
			} else {
				$password = password_hash($password,PASSWORD_DEFAULT);
				$this->db->exec("UPDATE user SET `password` = '$password' WHERE email = '$email' AND id = $id");
				$result = Array(
					"success" => "Пароль изменён."
				);
				echo json_encode($result);
			}
			return true;
		}
		if(!empty($_GET['id']) && !empty($_GET['email'])) {
			$data = Array(
				'id' 	=> $this->defenseStr($_GET['id']),
				'email' => $this->defenseStr($_GET['email'])
			);
			return $data;
		}
	}

	public function entry() {
		if(isset($_SESSION['confirm'])) {
			return "Активация прошла успешна. Для доступа к анкете войдите в свою учётную запись.";
		}
	}

	public function exit() {
		header("Location: /", true, 301);
		session_destroy();
		exit();
	}


	public function verification($action = null,$email = null, $password = null, $passwordRepeat = null) {
		if(!empty($action)) {
			switch($action) {
				case 'auth':
				$user = $this->db->query("SELECT email,password,active FROM user WHERE email = '$email'")->fetch(PDO::FETCH_ASSOC);
				if(!$user) {
					$result = Array(
						"error" => "Пользователя с таким email не существует, пройдите регистрацию."
					);
					echo json_encode($result);
					return $user;
				}

				if(!password_verify($password,$user['password'])) {
					$result = Array(
						"error" => "Неверный логин или пароль!"
					);
					echo json_encode($result);
					return false;
				}
				if($user['active'] == 0) {
					$result = Array(
						"error" => "Учётная запись не активирована! Активируйте учётную запись и попробуйте снова."
					);
					echo json_encode($result);
					return false;
				}

				return true;

				break;
				case 'registr':
				$user = $this->db->query("SELECT id FROM user WHERE email = '$email'")->fetch(PDO::FETCH_BOUND);
				$result = Array(
					"error" => "Пользователь с таким email уже существует."
				);
				if($user) {
					echo json_encode($result);
					return false;
				}
				if($password != $passwordRepeat) {
					$result = Array(
						"error" => "Пароли не совпадают."
					);
					echo json_encode($result);
					return false;
				}
				return true;
				break;
			}
		}
	}
}

?>