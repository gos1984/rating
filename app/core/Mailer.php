<?php
namespace core;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer {
	private $mail;
	public function __construct() {
		/*$this->mail = new PHPMailer();
		$this->mail->SMTPDebug = 2;
		$this->mail->isSMTP(true);
		$this->mail->Host = 'smtp.mrororr.ru';
		$this->mail->SMTPAuth = true;
		$this->mail->Username = 'no-reply@mrororr.ru';
		$this->mail->Password = '6G8z1T8f';
		$this->mail->SMTPSecure = 'ssl';                           
		$this->mail->Port = 465;*/
	}

	public function __destruct() {
		/*$this->mail->send();*/
		
	}
	

	public function confirm($id,$email) {
		$to      = 'nobody@example.com';
		$subject = 'the subject';
		$headers = 'From: webmaster@example.com' . "\r\n" .
		'Reply-To: webmaster@example.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();
		$message = "<p>Добрый день,</p>
		<p>Данное письмо подтверждает вашу регистрацию для прохождения «Всероссийского рейтинга отделений лучевой диагностики».</p>
		<p>Для заполнения анкеты пройдите, пожалуйста, по ссылке <a href=\"http://{$_SERVER['HTTP_HOST']}/confirm?id=$id&email=$email\" target=\"_blank\">Активация аккаунта</a></p>
		<p>Обращаем ваше внимание, что после 16 июня ссылка на анкету будет недействительна.</p>
		<p>С уважением,<br/>
		Команда МРО РОРР<br/>
		<a href=\"http://www.mrororr.ru\" target=\"_blank\">www.mrororr.ru</a></p>";
		mail($to, $subject, $message, $headers);
		/*$this->mail->setFrom('no-reply1@mrororr.ru', 'Всероссийский рейтинг отделений лучевой диагностики');
		$this->mail->CharSet = "utf-8";
		$this->mail->addAddress('npcmr-webinar@yandex.ru');
		$this->mail->isHTML(true);
		$this->mail->Subject = 'Here is the subject';
		$this->mail->Body    = 'This is the HTML message body <b>in bold!</b>';*/
	}
}
?>