<?php
    /* require('mail/class.phpmailer.php');
    require('mail/class.smtp.php'); */
    /* require('mail/Exception.php'); */
   use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../vendor/phpmailer/phpmailer/src/Exception.php';
    require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require '../vendor/phpmailer/phpmailer/src/SMTP.php'; 

    class Email{

        function enviarCorreo($fullname,$email,$mensaje){
            $usuario = 'dm5689357@gmail.com'; /*Correo al que llega */
            $cuerpoCorreo = '<h3><strong>Nombres completos: </strong>'.$fullname.'<br><strong>Correo: </strong>'.$email.'<br><br><br><strong>Mensaje:</strong><br>'.$mensaje.'</h3>';

            $mail = new PHPMailer(true);
            try {
                //$mail->SMTPDebug = 2;
                $mail->isSMTP();
                //$mail->Host = "ssl://smtp.gmail.com";

                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth = true;

                $mail->Username = 'dm5689357@gmail.com';
                $mail->Password = 'sixhzndmncahpcsd';

                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->SetFrom('dm5689357@gmail.com', "Panaderia y Pastaleria El Cisne");
                //$mail->FromName = utf8_decode("Requerimientos Clientes");
                $mail->AddAddress($usuario,'Correo empresa');

                $mail->Subject = utf8_decode("Solicitud");
                //$mail->AltBody = "Confirmación registro usuario";
                $mail->IsHTML (true);
                $mail->Body = $cuerpoCorreo;

                $envioCorreo = $mail->Send();
                return null;
            } catch (Exception $e) {
                return $e->getMessage();
            }
            /*if(!$envioCorreo){
               $error =  $mail->ErrorInfo;
                return $error;

            }else{
                return null;
            }*/
        }
    }
?>