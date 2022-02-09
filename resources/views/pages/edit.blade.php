@extends('layouts.main-layout')
@section('content')
    <section class="my-0 mx-auto text-center" style="width:75%; min-height:calc(100vh - 180px);">
        <h1>
            Edit post
        </h1>
    
        <form action="{{ route('update', $post -> id) }}" method="POST">
    
            @method("POST")
            @csrf
    
            <div class="form-group">
                <label for="title" class="col-form-label text-light">Title</label>
    
                <div>
                    <input type="text" name="title" value="{{ $post -> title }}">
                </div>
            </div>
    
            <div class="form-group">
                <label for="subTitle" class="col-form-label text-light">Subtitle</label>
                
                <div>
                    <input type="text" name="subTitle" value="{{ $post -> subTitle }}">
                </div>
            </div>
    
            <div class="form-group">
                <label for="postText" class="col-form-label text-light">Post Text</label>
    
                <div>
                    <textarea name="postText" rows="5" cols="30">{{ $post -> postText }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="category" class="col-form-label text-light">Category</label>
    
                <select name="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category -> id }}"

                            {{-- confronto l'id della category che sto trattando(la category del foreach) con l'id della category del post
                            se coincidono  aggiugo l'attributo selected--}}
                            @if ($category -> id === $post -> category -> id)
                                selected
                            @endif
                        >{{ $category -> name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <h4>Tags</h4>
                @foreach ($tags as $tag)
                    <input type="checkbox" name="tags[]" value="{{ $tag -> id }}"
                    
                    {{-- per ogni tag associato al post se il tag di cui sto parlando (tag dei foreach) si trova all'interno della lista dei tag associati al post aggiungo l'attributo checked --}}
                    @foreach ($post -> tags as $postTag)
                        @if ($tag -> id === $postTag -> id)
                            checked
                        @endif
                    @endforeach
                    
                    > {{ $tag -> name }} <br>
                @endforeach
            </div>

            <div class="form-group row mb-0 pt-2">
                <div class="col-lg-2 offset-lg-5">
                    <input type="submit" class="btn btn-primary btn-lg" value="Update">
                </div>
            </div>
        </form>
    </section>
@endsection