<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Mass Assing
    protected $fillable = 
    [
        'title',
        'slug',
        'body',
        'img_url',
        'author',
    ];
}
