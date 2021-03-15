<?php


namespace App\Model;


use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends \Illuminate\Database\Eloquent\Model
{
    use SoftDeletes;

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

}