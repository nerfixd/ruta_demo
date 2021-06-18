<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    require '../../modelo/modelo_usuario.php';

    $MU = new Modelo_Usuario();
    $email = htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8');
    $contrasActual =htmlspecialchars($_POST['contrasena'],ENT_QUOTES,'UTF-8');
    $contra = password_hash($_POST['contrasena'], PASSWORD_DEFAULT,['cost'=>10]);

    $consulta = $MU->Restablecer_Contra($email,$contra);
    if ($consulta ="1") {

        //Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {

             $mail->SMTPOptions = array(
                'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                )
            );
            $mail->SMTPDebug = 0;
            //Server settings
            //$mail->SMTPDebug = 2;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'rafael.meza134@gmail.com';                     //SMTP username
            $mail->Password   = 'evolno123';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('rafael.meza134@gmail.com', 'Nexus');
            $mail->addAddress($email);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Restablecer Password';
            $mail->Body    = '<!DOCTYPE html>
                                <html lang="en">
                                <head>
                                    <meta charset="UTF-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                </head>
                                <body>
                                    <table style="border: 1px solid black;width: 100%;">
                                        <thead>
                                            <tr>
                                                <td style="text-align: center;background: red;color:#FFFFFF" colspan="2">
                                                    <h1><b>Su contraseña fue restablecida</b></h1>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: left;" width="20%">
                                                    <img src="https://i.ibb.co/SQwk2R8/logo.png" alt="">
                                                </td>
                                                <td style="text-align: left;" align="justify"><span style="font-size: 25px;">Nueva Contraseña:<b>'.$contrasActual.'</b></span></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </body>
                              </html>';

            $mail->send();
            echo '1';
        } catch (Exception $e) {
            echo "0";
        }
        
    } else {
      echo '2';
    }

?>