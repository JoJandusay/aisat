<?php

namespace App\Http\Controllers;

use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendTestEmail()
    {
        $toEmail = 'isoncalub07@gmail.com';
        $message = 'Hello world';

        Mail::to($toEmail)->send(new TestEmail($message));
    }
}
