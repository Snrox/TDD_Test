<?php

namespace App\Jobs;

use App\Mail\WelcomeMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class WelcomeMessageSentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $email,$website_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($website_id,$email)
    {
        $this->email = $email;
        $this->website_id = $website_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        //Mail::to($this->email)->send(new WelcomeMessage());
        Mail::to($this->email)->send(new WelcomeMessage($this->website_id,$this->email));

    }
}
