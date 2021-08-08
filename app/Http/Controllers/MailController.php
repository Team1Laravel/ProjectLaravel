<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Mail\SendmailSubscribe;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function test()
    {
        $startTime = microtime(true);
        $sendmailSub = new SendmailSubscribe('aaaaaaaaaa');
        $sendEmailJob = new SendEmail($sendmailSub);
        dispatch($sendEmailJob);

        $endTime = microtime(true);
        $timeExecute = $endTime - $startTime;

        return "Done. Time execute: $timeExecute";
    }
}
