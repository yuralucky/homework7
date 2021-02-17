<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}