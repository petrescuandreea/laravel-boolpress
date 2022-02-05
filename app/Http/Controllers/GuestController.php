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
}
