<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.jino.ru';                         // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'reg@sav4yk.ru';                        // SMTP username
        $mail->Password   = 'Пароль';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;                                    // TCP port to connect to
        $mail->CharSet = "utf-8";

        //Recipients
        $mail->setFrom('reg@sav4yk.ru', 'Sav4yk From');
        $mail->addAddress('mail@sav4yk.ru', 'Sav4yk To');     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Письмо от меня мне';

        $Parsedown = new Parsedown();
        $mess =  $Parsedown->text('**Письмо от меня мне**
        - [X] Пространство имен
        - [X] Установка Composer
        - [X] Полноценная работа с Composerа
        ');

        $mail->Body    = $mess;
        $mail->AltBody = 'Письмо от меня мне';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
