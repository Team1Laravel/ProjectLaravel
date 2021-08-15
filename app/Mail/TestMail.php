<?php
 
namespace App\Mail;
 
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
 
class TestMail extends Mailable
{
    use Queueable, SerializesModels;
 
    public function build()
    {
        return $this
            ->from('xuanphuchb95@gmail.com')
            ->view('testmail');
    }
}