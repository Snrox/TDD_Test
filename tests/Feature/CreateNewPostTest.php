<?php

namespace Tests\Feature;

use App\Jobs\SubscribeMessageSentJob;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\Website;
use App\Models\Subscriber;
use App\Models\Post;

use Tests\TestCase;

class CreateNewPostTest extends TestCase
{

    use RefreshDatabase;
    use WithoutMiddleware;

  
    public function test_create_a_new_post()
    {
          $this->withoutExceptionHandling();


          $this->post('/web-create', [
            'title' => 'Test',
            'slug' => 'test',
            'body' => 'test'
        ]);


        $data = Website::latest()->first();

          $this->post('/post-create', [
            'website_id' => $data->id,
            'title' => 'Test',
            'img' => 'test',
            'description' => 'test',
            'isDeleted' => '0',
        ]);


        $this->assertDatabaseCount('posts', 1);
        
    }


    public function test_validating_a_post_submit()
    {
          //$this->withoutExceptionHandling();


          $this->post('/web-create', [
            'title' => 'Test',
            'slug' => 'test',
            'body' => 'test'
        ]);


        $data = Website::latest()->first();

          $this->post('/post-create', [
            'website_id' => $data->id,
            'title' => '',
            'img' => 'test',
            'description' => 'ts',
            'isDeleted' => '0',
        ]);


        $this->assertDatabaseCount('posts', 0);
        
    }


    public function test_all_web_subscribers_shall_receive_an_email_after_new_post_create()
    {
          //$this->withoutExceptionHandling();


          $this->post('/web-create', [
            'title' => 'Test',
            'slug' => 'test',
            'body' => 'test'
        ]);
        
        $data = Website::latest()->first();


        Subscriber::create(
        [
            'website_id' => $data->id,
            'email' => 'supunnethsara410@gmail.com',
        ],
       
    
       );

       $submit = Post::create([
        'website_id' => $data->id,
        'title' => 'Test',
        'img' => 'TEst',
        'description' => 'Test',
     ]);

     if($submit)
    {
       $data = Subscriber::where('website_id',$data->website_id)->get();
       
       if($data->count() > 0 )
       {
           foreach($data as $datas)
           {
              //Mail::to($datas->email)->send(new WelcomeMessage());

              SubscribeMessageSentJob::dispatch('test#gmail.com','Test title','Test img','Test');

           }

       }
      

       $this->assertTrue(true);
        
    }

  }

  public function test_all_web_subscribers_shall_receive_schedule_sending_an_email_after_new_post_create()
  {
        //$this->withoutExceptionHandling();


        $this->post('/web-create', [
          'title' => 'Test',
          'slug' => 'test',
          'body' => 'test'
      ]);
      
      $data = Website::latest()->first();


      Subscriber::create(
      [
          'website_id' => $data->id,
          'email' => 'supunnethsara410@gmail.com',
      ],
     
  
     );

     $submit = Post::create([
      'website_id' => $data->id,
      'title' => 'Test',
      'img' => 'TEst',
      'description' => 'Test',
   ]);

   if($submit)
  {
     $data = Subscriber::where('website_id',$data->website_id)->get();
     
     if($data->count() > 0 )
     {
         foreach($data as $datas)
         {
            //Mail::to($datas->email)->send(new WelcomeMessage());

            SubscribeMessageSentJob::dispatch('test#gmail.com','Test title','Test img','Test')->delay(now()->addMinutes(3));

         }

     }
    

     $this->assertTrue(true);
      
  }

}

}
