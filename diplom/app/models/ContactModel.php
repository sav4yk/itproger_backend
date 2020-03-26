<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require_once 'DB.php';

    class ContactModel {
        private $name;
        private $email;
        private $age;
        private $message;

        public function setData() {
            $this->name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $this->email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $this->age = filter_var($_POST['age'], FILTER_SANITIZE_NUMBER_INT);
            $this->message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
        }

        public function validData() {
            if(strlen($this->name) < 3)
                return "Имя слишком короткое";
            else if(strlen($this->email) < 3)
                return "Email слишком короткий или написан с ошибкой";
            else if($this->age<10)
                return "Возраст не менее 10 лет";
            else if(strlen($this->message)<10)
                return "Сообщение не менее 10ти симоволов";
            else
                return "Верно";
        }

        public function sendMes() {


            require 'vendor/autoload.php';

            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.jino.ru';                         // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'reg@sav4yk.ru';                        // SMTP username
                $mail->Password   = DB::MAILPASS;                               // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;                                    // TCP port to connect to
                $mail->CharSet = "utf-8";

                //Recipients
                $mail->setFrom('reg@sav4yk.ru', 'From short.sav4yk.ru');
                $mail->addAddress('mail@sav4yk.ru', 'Sav4yk To');     // Add a recipient

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'short.sav4yk.ru';



                $mail->Body    = '<p>Письмо от: '.$this->name.'</p><p>Возраст: '.$this->age.'</p><p>Почтовый адрес: '.$this->email.'</p><p>Текст: '.$this->message.'</p>';
                $mail->AltBody = 'Обратная связь';

                $mail->send();
            } catch (Exception $e) {
                error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}", 0);

            }

        }



    }
