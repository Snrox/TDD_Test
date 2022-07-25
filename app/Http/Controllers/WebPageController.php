<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Website;
use App\Models\Post;
use Inertia\Inertia;

class WebPageController extends Controller
{
    public function index($data)
    {

        $data = Website::where('slug',$data)->first();

        $post = Post::where('website_id',$data->id)->get();
        
        
        return Inertia::render('NewPage', compact('data','post'));

    }
}
