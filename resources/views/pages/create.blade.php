@extends('layouts.main-layout')
@section('content')
    <section class="my-0 mx-auto text-center" style="width:75%; height:calc(100vh - 180px);">
        <h1>
            Create new post
        </h1>
    
        <form action="{{ route('store') }}" method="POST">
    
            @method("POST")
            @csrf
    
            <div class="form-group">
                <label for="title" class="col-form-label text-light">Title</label>
    
                <div>
                    <input type="text" name="title" placeholder="Post Title">
                </div>
            </div>
    
            <div class="form-group">
                <label for="subTitle" class="col-form-label text-light">Subtitle</label>
                
                <div>
                    <input type="text" name="subTitle" placeholder="Post Subtitle">
                </div>
            </div>
    
            <div class="form-group">
                <label for="postText" class="col-form-label text-light">Post Text</label>
    
                <div>
                    <textarea name="postText" rows="5" cols="30"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="postDate" class="col-form-label text-light">Post Date</label>
    
                <div>
                    <input type="date" name="postDate">
                </div>
            </div>

            <div class="form-group row mb-0 pt-2">
                <div class="col-lg-2 offset-lg-5">
                    <input type="submit" class="btn btn-primary btn-lg" value="Save new post">
                </div>
            </div>
        </form>
    </section>
@endsection