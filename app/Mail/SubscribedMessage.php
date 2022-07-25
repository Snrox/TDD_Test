<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscribedMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $title,$img,$description;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title,$img,$description)
    {
        $this->title = $title;
        $this->img = $img;
        $this->description = $description;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mailTemplate.subscribePost');
    }
}
