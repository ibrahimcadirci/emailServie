<?php
namespace App\Services\Mail;


class MailGun implements MailServiceInterface {
    public function send(){
        return response()->json([
            "message"       => "Mail Gönderildi"
        ],202);
    }
}