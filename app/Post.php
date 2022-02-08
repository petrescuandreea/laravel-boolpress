<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [

        'authorName',
        'postDate',
        'title',
        'subTitle',
        'postText',
        'category_id',
    ];

    public function category() {

        // ad ogni post è collegata una sola categoria 
        return $this -> belongsTo(Category::class);
    }
}
