<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Website extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'thumbnail',
        'slug',
        'body',
    ];


    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function subscribers()
    {
        return $this->hasMany(Subscriber::class);
    }


}
