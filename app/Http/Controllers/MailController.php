<?php

namespace App\Http\Controllers;

use App\Services\Mail\MailService;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function send(Request $request){
        $subject            = $request->input('subject');
        $message            = $request->input('message');
        $to                 = $request->input('mailTo');
        $send               = MailService::send($subject,$message,$to);
        return $send;
    }
}
