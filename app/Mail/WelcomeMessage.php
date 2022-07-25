<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use App\Models\Website;
use Illuminate\Queue\SerializesModels;

class WelcomeMessage extends Mailable
{
    use Queueable, SerializesModels;

   
    public $email,$website_id;

    public function __construct($website_id,$email)
    {
        $this->email = $email;
        $this->website_id = $website_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $data = Website::find($this->website_id)->first();

        return $this->view('mailTemplate.subscribeWelcome',compact('data'));
    }
}
