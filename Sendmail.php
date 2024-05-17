<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/Dotenv.php';

use PHPMailer\PHPMailer\PHPMailer;

/**
 * A class to send mail for different purpose.
*/
class Sendmail {
  /**
   * Variable to act as a object of PHPMailer/
   *
   * @var object
  */
  public $mail;
  /**
   * A variable to act as a object of Dotenv class.
   *
   * @var object
  */
  public $env;
  /**
   * Constructor to initialize PHPMailer and Dotenv class.
  */
  public function __construct() {
    $this->mail = new PHPMailer(TRUE);
    $this->env = new Dotenv();
  }
  /**
   * Function to configure PHPMailer.
   *
   * @return void
  */
  public function config() {
    $this->mail->isSMTP(TRUE);
    $this->mail->Host = 'smtp.gmail.com';
    $this->mail->SMTPAuth = TRUE;
    $this->mail->isHTML(TRUE);
    // Accesing user name from .env file.
    $this->mail->Username = $_ENV['username'];
    // Accesing password from .env file.
    $this->mail->Password = $_ENV['appPassword'];
    $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $this->mail->Port = 465;
    // Adding sender's email address.
    $this->mail->setFrom($_ENV['username']);
  }

  public function sendInvoice() {
    $this->config();
    $mail = $this->mail;
    $email = "shuva.mallick@innoraft.com";
    $mail->addAddress($email);
    $mail->Subject = "Your Invoice!!";
    $mail->Body = "Your invoice is ready";
    $mail->addAttachment(__DIR__ . '/Invoice.pdf', "Invoice_{$email}", 'base64', 'application/pdf');
    try{
      $mail->send();
      return TRUE;
    }
    catch(Exception $e){
      echo $e;
      return FALSE;
    }
    return TRUE;
  }
}
