@extends('layouts.main-layout')
@section('content')
    
    <section class="content">

        @auth
            {{-- content for authenticated users  --}}
            <h1>{{ Auth::user() -> name }}</h1>

            <a class="btn btn-prinary" href="{{ route('logout') }}">LOGOUT</a>

            <section class="posts-container">

                @foreach ($posts as $post)
                    <a href="">
                        <div>
                            <h2>
                                {{ $post -> title }}
                            </h2>
                            <h3>
                                {{ $post -> subTitle ?? '-' }}
                            </h3>
                            <span>
                                ( {{ $post -> authorName }} - {{ $post -> postDate }})
                            </span>
                        </div>
                    </a>
                    <br>
                    <br>
                @endforeach
    
            </section>
        @else
            {{-- content for guest users  --}}
            <h1>You have to login or register to see our posts!</h1>
        @endauth

        @guest
        {{-- registration form  --}}
        <div id="registration">
            <h2>Registration</h2>
    
            <form action="{{ route('register') }}" method="POST">
    
                @method("POST")
                @csrf
    
                <label for="name">Name</label><br>
                <input type="text" name="name" placeholder="Your Name"> <br>
                <br>
                <label for="email">E-mail</label><br>
                <input type="email" name="email" placeholder="Your Email"> <br>
                <br>
                <label for="password">Password</label><br>
                <input type="password" name="password" placeholder="Password"> <br>
                <br>
                <label for="password-confirm">Confirm password</label><br>
                <input type="password" name="password_confirmation" placeholder="Repeat your password"> <br>
                <br>
                <br>
                <input type="submit" value="REGISTER">
            </form>
        </div>

        {{-- Login form  --}}
        <div id="log-in">
            <h2>Login</h2>
    
            <form action="{{ route('login') }}" method="POST">
    
                @method("POST")
                @csrf
    
                <label for="email"> Email</label><br>
                <input type="email" name="email" placeholder="Your Email"> <br>
                <br>
                <label for="password">Password</label><br>
                <input type="password" name="password" placeholder="Your Password"> <br>
                <br>
                <br>
                <input type="submit" value="LOGIN">
            </form>
        </div>
        @endguest
    </section>

@endsection