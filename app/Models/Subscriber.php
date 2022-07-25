<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Events\NewSubscribersToReceivedEvent;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable =[

        'website_id',
        'email',

    ];


  //  protected static function booted()
    //{
       // static::created(function(){
         //   NewSubscribersToReceivedEvent::dispatch();
        //});
   // }

}
