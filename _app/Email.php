<?php
namespace Notification;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email
{
    private $mail = \stdClass::class;

    /** Método construto: É o responsável por setar todos os parâmtros de configuração do e-mail a ser envido.*/
    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = 2;
        $this->mail->isSMTP();
        $this->mail->Host = 'mail.onestorm.com.br';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'contato@onestorm.com.br';
        $this->mail->Password = '#$Developer$%';
        $this->mail->SMTPSecure = 'tls';
        $this->mail->CharSet = 'utf-8';
        $this->mail->setLanguage('br');
        $this->mail->isHTML(true);
        $this->mail->Port = 587;
        //Recepients
        $this->mail->setFrom('contato@onestorm.com.br','Full Developer PHP');
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