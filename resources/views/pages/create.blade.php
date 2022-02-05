@extends('layouts.main-layout')
@section('content')
    <h1>
        Create new post
    </h1>

    <form action="#">

        <label for="authorName">Author Name:</label>
        <input type="text" name="authorName" placeholder="Author Name"><br>

        <label for="authorPhoto">Author Photo:</label>
        <input type="file" name="authorPhoto" placeholder="Author Photo"><br>

        <label for="postDate">Post Date:</label>
        <input type="date" name="postDate" placeholder="Post Date"><br>

        <label for="title">Title:</label>
        <input type="text" name="title" placeholder="Post Title"><br>

        <label for="subTitle">Subtitle:</label>
        <input type="text" name="subTitle" placeholder="Post Subtitle"><br>

        <label for="postText">Post Text:</label>
        <textarea name="postText" rows="5" cols="30"></textarea> <br>
        

        <label for="postImage">Post Image:</label>
        <input type="file" name="postImage" placeholder="Post Photo"><br>

        <input type="submit" value="Save new post">
    </form>
    
@endsection