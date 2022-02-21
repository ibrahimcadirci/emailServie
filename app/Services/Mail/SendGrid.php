<?php
namespace App\Services\Mail;


class SendGrid implements MailServiceInterface {
    public function send($subject,$message,$mailTo){
        return response()->json([
            "message"       => "Mail Gönderildi"
        ],202);
    }
}