<?php

namespace App\Http\Controllers;

use App\Jobs\SubscribeMessageSentJob;
use App\Jobs\WelcomeMessageSentJob;
use App\Mail\WelcomeMessage;
use App\Models\Post;
use App\Models\Website;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;
use PhpParser\Node\Stmt\Foreach_;

class postController extends Controller
{


    public function index()
    {

        $data = Post::all();

        return Inertia::render('Post',compact('data'));
        
    }




    
    public function create()
    {

        $data = Website::all();
        return Inertia::render('Post-create',compact('data'));
    }




    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:3',
        ]);


        $submit = Post::create([
           'website_id' => $request->website_id,
           'title' => $request->title,
           'img' => $request->img,
           'description' => $request->description,
        ]);

        if($submit)
       {
          $data = Subscriber::where('website_id',$request->website_id)->get();
          
          if($data->count() > 0 )
          {
              foreach($data as $datas)
              {
                 //Mail::to($datas->email)->send(new WelcomeMessage());

                 SubscribeMessageSentJob::dispatch($datas->email,$request->title,$request->img,$request->description)->delay(now()->addMinutes(1));

              }

          }
          

           return redirect('dashboard/posts');
       }



    }
}
