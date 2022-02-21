<?php
namespace App\Services\Mail;


interface MailServiceInterface {

    public function send($subject,$message,$mailTo);
}