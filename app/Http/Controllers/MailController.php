<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function basic_email()
    {
        $data = array('name' => "IT");

        Mail::send(['text' => 'mail'], $data, function ($message) {
            $message->to('opayabumanyu@gmail.com', 'DATA')->subject('Laravel Basic Testing Mail');
            $message->from('naufal@smcindonesia.com', 'IT');
        });
        echo "Basic Email Sent. Check your inbox.";
    }
    public function html_email()
    {
        $data['name'] = "IT";
        Mail::send('mail', $data, function ($message) {
            $message->to('opayabumanyu@gmail.com', 'DATA')->subject('Laravel Basic Testing Mail');
            $message->from('naufal@smcindonesia.com', 'IT');
        });
        echo "Basic Email Sent. Check your inbox.";
    }
}
