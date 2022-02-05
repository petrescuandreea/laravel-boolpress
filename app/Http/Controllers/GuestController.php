<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class GuestController extends Controller
{
    public function home() {

        return view('pages.home');
    }

    // show all posts 
    public function posts() {

        $posts = Post::all();

        return view('pages.home', compact('posts'));
    }

    // create new post 
    public function create() {

        return view('pages.create');
    }

    public function store(Request $request) {

        // validation 
        $data = $request -> validate([

            'authorName' => 'required|string|max:255',
            'authorPhoto' => 'required|string|url',
            'postDate' => 'required|date',
            'title' => 'required|string|max:255',
            'subTitle' => 'nullable|string|max:255',
            'postText' => 'required|max:15000',
            'postImage' => 'nullable|string|url',
        ]);

        // create new post 
        $post = Post::create($data);

        // insert new element in posts 
        return redirect() -> route('posts');
    }
}
