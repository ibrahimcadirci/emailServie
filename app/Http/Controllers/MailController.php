<?php

namespace App\Http\Controllers;

use App\Services\Mail\MailService;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function send(Request $request){
        $send               = MailService::send();
        return $send;
    }
}
