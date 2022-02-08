@extends('layouts.main-layout')
@section('content')
    <main>
        <h1 class="text-center text-capitalize mb-4">Hi {{ Auth::user() -> name }} !</h1>

        <div class="d-flex justify-content-between" >
            <div>
                <h3 class="pl-3">
                    Here you can find our posts. If you want to create one don't hesitate, we will be happy to read it!
                </h3>
            </div>

            <div>
                <a class="btn btn-secondary mr-2" href="{{ route('create') }}" role="button">NEW POST</a>
                <a class="btn btn-primary mr-1" href="{{ route('logout') }}" role="button">LOGOUT</a>
            </div>
        </div>

        <section class="d-flex flex-wrap justify-content-around py-5 text-info">
            @foreach ($posts as $post)
            <div class="mb-5 py-5 border rounded border-top-0 text-center" style="width:calc(90% / 3);">
                <a href="" class="text-decoration-none">
                    <h2 >
                        Title: {{ $post -> title }}
                    </h2>
                    <h3>
                        Subtitle: {{ $post -> subTitle ?? 'No subtitle' }}
                    </h3>
                    <span>
                        Written by:( {{ $post -> authorName }} - {{ $post -> postDate }})
                    </span>

                    <p>Category: {{ $post -> category -> name }}</p>
                    <p>Descriprion: {{ $post -> category -> description }}</p>
                    <div>
                        <span>Tags:</span>
                        @foreach ($post -> tags as $tag)
                            {{ $tag -> name }} <br>
                        @endforeach
                    </div>


                    <div class="pt-3">
                        <span class="d-block">
                            Clik to read more ...
                        </span>
                    </div>
                </a>
            </div>
            @endforeach
        </section>
    </main>
@endsection