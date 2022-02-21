<?php
namespace App\Services\Mail;


class MailService {
    protected static $services     = [
        MailGun::class,
        SendGrid::class
    ];


    public static function send(){
        try {
            $mail           = new self::$services[0];
            return $mail->send();
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }

    }
}
