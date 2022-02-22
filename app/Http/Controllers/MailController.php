<?php

namespace App\Http\Controllers;

use App\Services\Mail\MailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    public function send(Request $request){
        $validator = Validator::make($request->all(), [
            'subject' => 'required|max:255',
            'mailTo' => 'required|email',
        ]);
        if ($validator->fails()) {
            return response()->json([
                "message"   => "Please fill in all fields",
                "errors" => $validator->errors()
            ]);
        }
        
        $subject            = $request->input('subject');
        $message            = $request->input('message');
        $to                 = $request->input('mailTo');
        $send               = MailService::send($subject,$message,$to);
        return $send;
    }
}
