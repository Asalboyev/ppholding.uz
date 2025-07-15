<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendToEmailController extends Controller
{
    public function send() {
        Mail::send(['text' => 'mail'], ['name' => 'test name'], function($message) {
            $message->to('shohijahonaxmetov@gmail.com', 'to text')->subject('Запрос с сайта PPh');
            $message->from('licko37225021@gmail.com', 'сайт PPh');
        });
    }
}
