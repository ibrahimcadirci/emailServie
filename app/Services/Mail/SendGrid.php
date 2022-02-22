<?php
namespace App\Services\Mail;
use SendGrid\Mail\Mail;

class SendGrid implements MailServiceInterface {

    // Gönderen mail adresi
    protected $mailFrom             = "ibrahimh.cadirci@gmail.com";


    public function send($subject,$message,$mailTo){
        $email = new Mail(); 
        $email->setFrom($this->mailFrom, "Mail Service");
        $email->setSubject($subject);
        $email->addTo($mailTo, "Mail Service");

        $email->addContent(
            "text/html", $message
        );
        $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
            $response = $sendgrid->send($email);
            if(in_array($response->statusCode(),[200,202])){
                $responseData       = json_decode($response->body());
                return response()->json([
                    "message"       => "Mail gönderildi."
                ],202);
            }else{
                $responseData       = json_decode($response->body());
                return response()->json([
                    "message"       => $responseData->errors[0]->message,
                    "data"          => $response
                ],$response->statusCode());
            }
        
    }
}