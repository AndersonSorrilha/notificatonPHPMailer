<?php
/**
 * Author: Anderson Sorrilha Echeverria
 * Contato: andersonse@gmail.com
 * Project:{notification}
 * Date: {17/01/2019} - {11:44}
 */

require __DIR__ .'/lib_ext/autoload.php';

use Notification\Email;

$novoEmail = new Email;
$novoEmail->sendEmail(
    "Teste de envio de -email",
    "<p>Teste de envio de e-mail com a bibliotéca <b>PHPMailer</b></p>",
    "contato@onestorm.com.br",
    "Sorrilha",
    "anderson.echeverria@mj.gov.br",
    "Anderson"
       );
var_dump($novoEmail);

