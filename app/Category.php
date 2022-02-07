<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillbale = [

        'name',
        'description',
    ];

    public function posts() {

        // ad ogni categoria può appartenere più post 
        return $this -> hasMany(Post::class);
    }
}
