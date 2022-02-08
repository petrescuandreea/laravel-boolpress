<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [

        'name',
    ];

    // metodo che definisce la relazione many-to-many 
    public function posts() {

        return $this -> belongsToMany(Post::class);
    }
}
