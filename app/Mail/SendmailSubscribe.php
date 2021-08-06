<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendmailSubscribe extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    use Queueable, SerializesModels;
    
    
    
    public $url;
    
    /**
    
    * Create a new message instance.
    
    *
    
    * @return void
    
    */
    
    public function __construct($url)
    
    {       
        $this->url = $url;
        $this->subject('FLEXGO, Thank you for your subcribe!');
    }
    
    
    
    /**
    
    * Build the message.
    
    *
    
    * @return $this
    
    */
    
    public function build()
    
    {        
        return $this->view('mailsubcribe');
        
    }
}
