<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Post;

class GuestController extends Controller
{
    public function home() {

        return view('pages.index');
    }

    // show all posts 
    public function posts() {

        $posts = Post::orderBy('created_at', 'desc') -> get();

        return view('pages.home', compact('posts'));
    }

    // create new post 
    public function create() {

        return view('pages.create');
    }

    public function store(Request $request) {

        // validation 
        $data = $request -> validate([

            'title' => 'required|string|max:255',
            'subTitle' => 'nullable|string|max:255',
            'postText' => 'required|string|max:15000',
        ]);

        $data['Author'] = Auth::user() ->name;
        // create new post 
        $post = Post::create($data);

        // insert new element in posts 
        return redirect() -> route('posts');
    }
}
