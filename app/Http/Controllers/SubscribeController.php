<?php

namespace App\Http\Controllers;

use App\Jobs\SubscribeMessageSentJob;
use App\Models\Subscriber;
use App\Jobs\WelcomeMessageSentJob;
use App\Mail\WelcomeMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscribeController extends Controller
{
    public function store(Request $request)
    {


        $request->validate([
            'website_id' => 'required',
            'email' => 'required|email',
        ]);

        $data = Subscriber::create([
            'website_id' => $request->website_id,
            'email' => $request->email,
        ]);
        
        if($data)
        {

            WelcomeMessageSentJob::dispatch($request->website_id,$request->email)->delay(now()->addMinutes(1));;

            //Mail::to($request->email)->send(new WelcomeMessage());

            return redirect()->back();
          
        }

        return redirect()->back();


    }
}
