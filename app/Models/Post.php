<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable =[

        'website_id',
        'title',
        'img',
        'description',
        'isDeleted'

    ];

    public function website()
    {
        return $this->hasOne(Website::class);
    }

}
