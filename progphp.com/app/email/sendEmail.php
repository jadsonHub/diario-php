<?php

require '/var/www/progphp.com/app/PHPMailer-master/PHPMailer.php';
require '/var/www/progphp.com/app/PHPMailer-master/SMTP.php';


use PHPMailer\PHPMailer\PHPMailer;




function enviarEmail($emailDest,$Titulo,$Mensagem){

    $mail = new PHPMailer(true);

    $mail->isSMTP();
  //  $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->SMTPAuth = true;

    $mail->Username = 'devphpsuport@gmail.com';
    $mail->Password = 'dudumatador';

    $mail->setFrom('devphpsuport@gmail.com');
    $mail->addAddress($emailDest);

    $mail->isHTML(true);
    $mail->Subject = $Titulo;
    $mail->Body = $Mensagem;
    
    if($mail->send()){
       return  'enviado o email';
    }else{
        return 'Não enviado!';
    }


}

