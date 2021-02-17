<?php


namespace App\Model;


class Tag extends \Illuminate\Database\Eloquent\Model
{
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

}