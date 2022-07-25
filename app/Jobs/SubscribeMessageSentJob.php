<?php

namespace App\Jobs;

use App\Mail\SubscribedMessage;
use App\Mail\WelcomeMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SubscribeMessageSentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email,$title,$img,$description;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email,$title,$img,$description)
    {
        $this->email = $email;
        $this->title = $title;
        $this->img = $img;
        $this->description = $description;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(new SubscribedMessage($this->title,$this->img,$this->description));
    }
}
