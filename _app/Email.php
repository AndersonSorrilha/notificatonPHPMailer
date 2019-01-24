<?php
namespace Notification;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email
{
    private $mail = \stdClass::class;

    /** Método construto: É o responsável por setar todos os parâmtros de configuração do e-mail a ser envido.*/
    public function __construct($smtpDebug, $host, $user, $password, $smtpSecure, $port, $setFromEmail, $setFromName)
    {
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = $smtpDebug;            // Enable verbose debug output
        $this->mail->isSMTP();                          // Set mailer to use SMTP
        $this->mail->Host = $host;                      // Specify main and backup SMTP server
        $this->mail->SMTPAuth = true;                   // Enable SMTP authentication
        $this->mail->Username = $user;                  // SMTP username
        $this->mail->Password = $password;              // SMTP password
        $this->mail->SMTPSecure = $smtpSecure;          // Enable TLS encryption `ssl` also acepted
        $this->mail->CharSet = 'utf-8';                 // TCP port to connect to
        $this->mail->setLanguage('br');
        $this->mail->isHTML(true);
        $this->mail->Port = $port;
        //Recepients
        $this->mail->setFrom($setFromEmail,$setFromName);
    }

    /** Método construto: É o responsável por setar todos os parâmtros do e-mail.
     * assunto, corpo do e-mail, destinatário
     * */
    public function sendEmail($subject, $bady, $replayEmail, $replayName, $addressEmail, $addressName){
        $this->mail->Subject = (string)$subject;
        $this->mail->Body = $bady;
        $this->mail->addReplyTo($replayEmail, $replayName);
        $this->mail->addAddress($addressEmail, $addressName);

        try{
            $this->mail->send();
        }catch (\Exception $e){
            echo "Erro ao enviar o e-mail: {$this->mail->ErrorInfo} {$e->getMessage()}";
        }
    }
}