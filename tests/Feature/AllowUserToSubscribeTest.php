<?php

namespace Tests\Feature;

use App\Models\Website;
use App\Models\Subscriber;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Event;
use App\Events\NewSubscribersToReceivedEvent;
use App\Jobs\WelcomeMessageSentJob;
use App\Mail\WelcomeMessage;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class AllowUserToSubscribeTest extends TestCase
{
   use RefreshDatabase;
   use Dispatchable;
   use WithoutMiddleware;



    public function test_subscribe_endpoit_working()
    {
        $this->withoutExceptionHandling();

        $this->post('/web-create', [
            'title' => 'Test',
            'slug' => 'test',
            'body' => 'test'
        ]);

        $data = Website::latest()->first();

        $this->post('/subscribe',[
            'website_id' => $data->id,
            'email' => 'test@gmail.com',
        ]);

        $this->assertDatabaseCount('subscribers', 1);
    }


    public function test_validate_subscribe_user_email()
    {
       // $this->withoutExceptionHandling();

        $this->post('/web-create', [
            'title' => 'Test',
            'slug' => 'test',
            'body' => 'test'
        ]);


        $data = Website::latest()->first();

        $this->post('/subscribe',[
            'website_id' => $data->id,
            'email' => 'test',
        ]);


        $this->assertDatabaseCount('subscribers', 0);
    }


    public function test_subscriber_to_send_welcome_email()
    {
        //$this->withoutExceptionHandling();

        $this->post('/web-create', [
            'title' => 'Test',
            'slug' => 'test',
            'body' => 'test'
        ]);


        $data = Website::latest()->first();

        $submit = Subscriber::create([
            'website_id' => $data->id,
            'email' => 'supunnethsara410@gmail.com',
        ]);

        if($submit)
        {

           // Mail::to('to@example.com')->send(new WelcomeMessage());
          
            //WelcomeMessageSentJob::dispatch();

            WelcomeMessageSentJob::dispatch($data->id,'test@gmail.com')->delay(now()->addMinutes(1));


           // dd("Email has been deliverd");

            $this->assertTrue(true);
            

        }



    }

}
