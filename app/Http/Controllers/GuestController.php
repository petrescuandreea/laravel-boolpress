<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Category;
use App\Tag;

class GuestController extends Controller
{
    public function home() {

        return view('pages.home');
    }

    // show all posts 
    public function posts() {
        
        $posts = Post::orderBy('created_at', 'desc') ->get();

        return view('pages.posts', compact('posts'));
    }

    // create new post 
    public function create() {

        $categories = Category::all();
        // dd($categories);
        $tags = Tag::all();

        return view('pages.create', compact('categories', 'tags'));
    }

    public function store(Request $request) {

        // validation 
        $data = $request -> validate([

            'title' => 'required|string|max:255',
            'subTitle' => 'nullable|string|max:255',
            'postText' => 'required|string|max:15000',
        ]);

        $data['authorName'] = Auth::user() -> name;

        // create new post 
        $post = Post::make($data);

        // category validation
        $category = Category::findOrFail($request -> get('category'));
        $post -> category() -> associate($category);
        // insert new element in posts 
        $post -> save();


        // tags validation 
        $tags = Tag::findOrFail($request -> get('tags'));
        // dd($tags);
        $post -> tags() -> attach($tags);
        $post -> save();

        return redirect() -> route('posts');
    }

    public function edit($id) {

        $categories = Category::all();
        $tags = Tag::all();
        // dd($id);
        $post = Post::findOrFail($id);

        return view('pages.edit', compact('categories', 'tags', 'post'));
    }

    public function update(Request $request, $id) {

        // validation 
        $data = $request -> validate([

            'title' => 'required|string|max:255',
            'subTitle' => 'nullable|string|max:255',
            'postText' => 'required|string|max:15000',
        ]);

        $data['authorName'] = Auth::user() -> name;

        // find post to update 
        $post = Post::findOrFail($id);

        // update post 
        $post -> update($data);

        // update category 
        $category = Category::findOrFail($request -> get('category'));
        $post -> category() -> associate($category);
        $post -> save();

        // update tags 
        $tags = Tag::findOrFail($request -> get('tags'));
        $post -> tags() -> sync($tags);
        $post -> save();

        return redirect('/posts');
    }
}
