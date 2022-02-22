<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Mail\MailService;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    public function send(Request $request){
        $errorMessages          = [
            "subject.required" => "Başlık boş geçilemez!",
            "mailTo.required" => "Gönderim adresi boş geçilemez!",
        ];
        $validator = Validator::make($request->all(), [
            'subject' => 'required|max:255',
            'mailTo' => 'required|email',
        ],$errorMessages);
        if ($validator->fails()) {
            return response()->json([
                "message"   => "Lütfen tüm alanları doldurun.",
                "errors" => $validator->errors()
            ],400);
        }
        
        $subject            = $request->input('subject');
        $message            = $request->has('message') ? $request->input('message') : " ";
        $to                 = $request->input('mailTo');
        $send               = MailService::send($subject,$message,$to);
        return $send;
    }
}
