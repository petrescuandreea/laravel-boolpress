<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Category;

class GuestController extends Controller
{
    public function home() {

        return view('pages.home');
    }

    // show all posts 
    public function posts() {

        $posts = Post::all();

        return view('pages.posts', compact('posts'));
    }

    // create new post 
    public function create() {

        $categories = Category::all();
        // dd($categories);
        return view('pages.create', compact('categories'));
    }

    public function store(Request $request) {

        // validation 
        $data = $request -> validate([

            'title' => 'required|string|max:255',
            'subTitle' => 'nullable|string|max:255',
            'postText' => 'required|string|max:15000',
            'postDate' => 'required|date',
        ]);

        $data['authorName'] = Auth::user() -> name;

        // create new post 
        $post = Post::make($data);

        // category validation
        $category = Category::findOrFail($request -> get('category'));

        $post -> category() -> associate($category);
        // insert new element in posts 
        $post -> save();

        return redirect() -> route('posts');
    }
}
