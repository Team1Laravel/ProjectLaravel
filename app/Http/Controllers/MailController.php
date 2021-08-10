<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Mail\SendmailSubscribe;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function test()
    {
        $startTime = microtime(true);
        $jobEmail = new SendEmail();
        dispatch($jobEmail);
        $endTime = microtime(true);
        $timeExecute = $endTime - $startTime;
        return "Done. Time execute: $timeExecute";
    }
}
