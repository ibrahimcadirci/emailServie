<?php
namespace App\Services\Mail;


class MailService {
    protected static $services     = [
        MailGun::class,
        SendGrid::class
    ];


    public static function send($subject,$message,$mailTo){
        try {
            $mail           = new self::$services[1];
            return $mail->send($subject,$message,$mailTo);
        } catch (\Throwable $e) {
            return response()->json([
                "message"       => $e->getMessage()
            ],500);
        } catch (\Exception $e) { 
            // handle $e
            return response()->json([
                "message"       => $e->getMessage()
            ],500);
        }
    }
}
