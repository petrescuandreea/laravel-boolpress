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
    ];
}
