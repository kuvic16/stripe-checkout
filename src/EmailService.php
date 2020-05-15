<?php

namespace StripePhp\App;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/**
 * Email Service Class
 */
final class EmailService{

    /**
     * @var php_mailer
     */
    private $mail;

    /**
     * Initialize the class
     */
    public function __construct(){
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug  = SMTP::DEBUG_OFF;                      // Enable verbose debug output
        $this->mail->isSMTP();                                            // Send using SMTP
        $this->mail->Host       = $_ENV['EMAIL_SMTP'];                    // Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $this->mail->Username   = $_ENV['EMAIL_USERNAME'];                // SMTP username
        $this->mail->Password   = $_ENV['EMAIL_PASSWORD'];                // SMTP password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $this->mail->Port       = $_ENV['EMAIL_PORT'];                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    }

    /**
     * Send email
     * 
     * @return boolean
     */
    public function send($toEmail, $subject, $body){
        try{
            //Recipients
            $this->mail->setFrom($_ENV['EMAIL_SENDER'], 'no-reply');
            $this->mail->addAddress($toEmail, 'Order');     // Add a recipient
            
            // Content
            $this->mail->isHTML(true);                      // Set email format to HTML
            $this->mail->Subject = $subject;
            $this->mail->Body    = $body;
            $this->mail->send();
            return true;
        }catch(\Exception $ex){
            //print_r($ex->getMessage());
            return false;
        }
    }
}