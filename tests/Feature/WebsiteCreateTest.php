<?php

namespace Tests\Feature;

use App\Models\Website;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WebsiteCreateTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_creating_a_website_endpoint()
    {

        //$this->withoutExceptionHandling();

        $this->post('/web-create', [
            'title' => 'Test',
            'slug' => 'test',
            'body' => 'test'
        ]);


        $this->assertDatabaseCount('websites', 1);

        
    }

    public function test_slug_is_required()
    {

       // $this->withoutExceptionHandling();

       //slug is required

        $this->post('/web-create', [
            'title' => 'Test',
            'slug' => ' ',
            'body' => 'test'
        ]);


        $this->assertDatabaseCount('websites', 0);

        
    }

    public function test_checking_a_website_slug_in_the_database()
    {

        $this->withoutExceptionHandling();

        $this->post('/web-create', [
            'title' => 'Test',
            'slug' => 'test',
            'body' => 'test'
        ]);

        

        $this->assertDatabaseHas('websites',[
            'slug' => 'test',
        ]);


       // $this->assertDatabaseCount('websites', 1);

       

        
    }
    

}
