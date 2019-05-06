<?php
namespace core;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer {
	private $mail;
	public function __construct() {
		$this->mail = new PHPMailer();
		$this->mail->isSMTP(true);
		$this->mail->Host = 'mail.nic.ru';
		$this->mail->SMTPAuth = true;
		$this->mail->Username = 'info@topld.ru';
		$this->mail->Password = 'da3614f0a9A';
		$this->mail->SMTPSecure = 'ssl';
		$this->mail->Port = 465;
	}

	public function __destruct() {
		$this->mail->send();
		
	}
	

	public function sendConfirm($id,$email) {
		$this->mail->setFrom('info@topld.ru', 'Всероссийский рейтинг отделений лучевой диагностики');
		$this->mail->CharSet = "utf-8";
		$this->mail->addAddress($email);
		$this->mail->isHTML(true);
		$this->mail->Subject = "Активация учётной записи";
		$this->mail->Body    = "<p>Добрый день,</p>
		<p>Данное письмо подтверждает вашу регистрацию для прохождения «Всероссийского рейтинга отделений лучевой диагностики».</p>
		<p>Для активации учётной записи пройдите пожалуйста по ссылке <a href=\"http://{$_SERVER['HTTP_HOST']}/confirm?id=$id&email=$email\" target=\"_blank\">Активация аккаунта</a></p>
		<p>Обращаем ваше внимание, что после 25 марта ссылка на анкету будет недействительна.</p>
		<p>С уважением,<br/>
		Команда МРО РОРР<br/>
		<a href=\"http://www.mrororr.ru\" target=\"_blank\">www.mrororr.ru</a></p>";
	}

	public function sendForgot($id,$email) {
		$this->mail->setFrom('info@topld.ru', 'Всероссийский рейтинг отделений лучевой диагностики');
		$this->mail->CharSet = "utf-8";
		$this->mail->addAddress($email);
		$this->mail->isHTML(true);
		$this->mail->Subject = "Смена пароля";
		$this->mail->Body    = "<p>Добрый день,</p>
		<p>Для смены пароля пройдите по <a href=\"http://{$_SERVER['HTTP_HOST']}/password?id=$id&email=$email\" target=\"_blank\">ссылке</a></p>
		<p>С уважением,<br/>
		Команда МРО РОРР<br/>
		<a href=\"http://www.mrororr.ru\" target=\"_blank\">www.mrororr.ru</a></p>";
	}

	public function sendResult($id,$email,$name,$patron,$file) {
		$this->mail->setFrom('info@topld.ru', 'Всероссийский рейтинг отделений лучевой диагностики');
		$this->mail->CharSet = "utf-8";
		$this->mail->addAddress($email);
		$this->mail->isHTML(true);
		$this->mail->addStringAttachment($file,'result.pdf');
		$this->mail->Subject  = "Результат анкетирования";
		$this->mail->Body = "Уважаемый (ая) $name $patron,
		<p>Благодарим вас за заполнение анкеты и участие во «Всероссийском рейтинге отделений лучевой диагностики»!</p>
		<p>Результаты вашего анкетирования в приложении.</p>
		<p>К 30 апреля мы подведем итоги, подготовим рейтинг лучших отделений и обязательно пригласим вас ознакомиться с ним.</p>
		<p>Обращаем ваше внимание на то, что для публикации рейтинга будут использованы следующие данные: название организации, тип, город и модальности, имеющиеся в отделении. Прочая информация, предоставленная вами в анкете, не будет размещена в открытом доступе.</p>
		<p>Если у вас остались вопросы, пожалуйста, обращайтесь info@topld.ru</p>
		<p>С уважением,<br/>
		Команда МРО РОРР
		</p>";
	}
}
?>