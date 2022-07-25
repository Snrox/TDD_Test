<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Website;
use Illuminate\Support\Str;
use Inertia\Inertia;

class WebCreateController extends Controller
{

    public function index() 
    {

        $data = Website::all(); 

        return Inertia::render('Web',compact('data'));
    }





    public function create()
    {
        return Inertia::render('Web-create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'slug' => 'required|min:4',
        ]);


      $submit = Website::create([
            'title' => $request->title,
            'thumbnail' => $request->thumbnail,
            'slug' => Str::slug($request->slug),
            'body' => $request->body,
      ]);


       if($submit)
       {
           return redirect('dashboard/web-sites');
       }
      
        
    }
}
