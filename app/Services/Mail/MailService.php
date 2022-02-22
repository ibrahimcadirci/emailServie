<?php
namespace App\Services\Mail;


class MailService {
    protected static $services     = [
        MailGun::class,
        SendGrid::class
    ];


    public static function send($subject,$message,$mailTo){

        for($i = 0; $i < count(self::$services);$i++){
            $service           = self::$services[$i];
            foreach(self::$services as $service){
                try {
                    $mail           = new $service;
                    $response       = $mail->send($subject,$message,$mailTo);
                    if($response->status() != 202) continue;
                    return $response;
        
                } catch (\Throwable $e) {
                    if(($i +1) != count(self::$services)) continue;
                    return response()->json([
                        "message"       => "İsteği şuanda hiçbir serviş işleme alamıyor lütfen daha sonra tekrar deneyin. "
                    ],500);
                } catch (\Exception $e) { 
                    if(($i +1) != count(self::$services)) continue;
                    return response()->json([
                        "message"       => "İsteği şuanda hiçbir serviş işleme alamıyor lütfen daha sonra tekrar deneyin. "
                    ],500);
                }
            }

        }
        
    }
}
