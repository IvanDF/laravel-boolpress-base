<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Tags - Posts
    public function tags() {
        return $this->belongsToMany('App\Post');
    }
}
