<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [

        'authorName',
        'title',
        'subTitle',
        'postText',
        'category_id',
    ];

    // metodo che definisce la relazione one-to-many 
    public function category() {

        // ad ogni post è collegata una sola categoria 
        return $this -> belongsTo(Category::class);
    }

    // metodo che definisce la relazione many-to-many 
    public function tags() {

        return $this -> belongsToMany(Tag::class);
    }
}
