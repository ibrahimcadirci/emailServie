<?php
namespace App\Services\Mail;

use Mailgun\Mailgun as MailgunMailgun;

class MailGun implements MailServiceInterface {

    // Gönderen mail adresi
    protected $mailFrom             = "ibrahimh.cadirci@gmail.com";
    protected $apikey; 

    public function __construct(){
        $this->apikey           = getenv('MAILGUN_APIKEY');
    }

    public function send($subject,$message,$mailTo){
        // First, instantiate the SDK with your API credentials
        $mg = MailgunMailgun::create($this->apikey); // For US servers

        // Now, compose and send your message.
        // $mg->messages()->send($domain, $params);
        $mg->messages()->send('sandbox380f340ca353408b9814ba25a8b7be7d.mailgun.org', [
            'from'    => $this->mailFrom,
            'to'      => $mailTo,
            'subject' => $subject,
            'html'    => $message
          ]);
        return response()->json([
            "message"       => "Mail gönderildi."
        ],202);
    }
}