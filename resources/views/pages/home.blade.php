@extends('layouts.main-layout')
@section('content')
    <main>
        @auth
            {{-- content for authenticated users  --}}
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
                            {{ $post -> title }}
                        </h2>
                        <h3>
                            {{ $post -> subTitle ?? '-' }}
                        </h3>
                        <span>
                            ( {{ $post -> authorName }} - {{ $post -> postDate }})
                        </span>

                        <div class="pt-3">
                            <span class="d-block">
                                Clik to read more ...
                            </span>
                        </div>
                    </a>
                </div>
                @endforeach
            </section>
        @else
            {{-- content for guest users  --}}
            <h1 class="text-center" style="height:50px;">You have to login or register to see our posts or create one!</h1>
        @endauth

        @guest
        <section class="forms-container d-flex justify-content-center align-items-center" style="height:calc(100vh - 238px)">
            <div class="d-flex flex-row justify-content-center align-items-center">
                {{-- registration form  --}}
                <div id="registration" class="width:200px mr-5 p-4 bg-secondary border border-white rounded">
                    <h2 class="text-dark text-center">Registration</h2>
            
                    <form action="{{ route('register') }}" method="POST">
            
                        @method("POST")
                        @csrf
                        
                        <div class="form-group">
                            <label for="name" class="col-md-4 col-form-label text-dark">Name</label>

                            <div class="col-md-6">
                                <input type="text" name="name" placeholder="Your Name">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="email" class="col-md-6 col-form-label text-dark">E-mail</label>

                            <div class="col-md-6">
                                <input type="email" name="email" placeholder="Your Email"> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 col-form-label text-dark">Password</label>

                            <div class="col-md-6">
                                <input type="password" name="password" placeholder="Password"> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-9 col-form-label text-dark">Confirm password</label>

                            <div class="col-md-6">
                                <input type="password" name="password_confirmation" placeholder="Repeat your password">
                            </div>
                        </div>

                        <div class="form-group row mb-0 pt-2">
                            <div class="col-md-6 offset-md-2">
                                <input type="submit" class="btn btn-primary btn-lg" value="REGISTER">
                            </div>
                        </div>
                    </form>
                </div>
    
                {{-- Login form  --}}
                <div id="log-in" class="width:200px ml-5 p-4 bg-secondary border border-white rounded">
                    <h2 class="text-dark text-center">Login Here</h2>
            
                    <form action="{{ route('login') }}" method="POST">
            
                        @method("POST")
                        @csrf
            
                        <div class="form-group">
                            <label for="email" class="col-md-6 col-form-label text-dark">E-mail</label>

                            <div class="col-md-6">
                                <input type="email" name="email" placeholder="Your Email"> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 col-form-label text-dark">Password</label>

                            <div class="col-md-6">
                                <input type="password" name="password" placeholder="Password"> 
                            </div>
                        </div>

                        <div class="form-group row mb-0 pt-2">
                            <div class="col-md-6 offset-md-3">
                                <input type="submit" class="btn btn-primary btn-lg" value="LOGIN">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        @endguest
    </main>
@endsection