<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [

        'authorName',
        'authorPhoto',
        'postDate',
        'title',
        'subTitle',
        'postText',
        'postImage',
    ];
}
