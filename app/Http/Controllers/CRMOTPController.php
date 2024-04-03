<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CRMOTPController extends Controller
{
    public function Send_OTP($otp,$mail){
        Mail::send('otpcrm', compact('otp','mail'), function ($message) use ($mail) {
            $mail = str_replace('~', '@', $mail);
            $message
                    ->to($mail, "CRM USER")
                    ->subject("Your OTP");
            $message->from('helpdesk@riyadi.co.id', 'SYSTEM NO REPLY');
        });
        echo $mail;
    }
}
