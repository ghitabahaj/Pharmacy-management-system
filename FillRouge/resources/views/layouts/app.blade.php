<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pharmacy | Sign in </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="{{asset('css/sign.css') }}" >

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <!-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto">

                    </ul>

        
                    <ul class="navbar-nav ms-auto">
                       
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div> -->

    <div class="col-lg-5 col-md-6 col-11 m-auto d-flex justify-content-between mt-5">
    <button class="m-auto d-block w-50 p-2 button1 mycolor myborder border-bottom-0" style="border-radius: 5px 5px 0px 0px ;" id="lg-Btn">
        Log In
    </button>
    <button class="m-auto d-block w-50 p-2 bg-white mycolor myborder  border-bottom-0" style="border-radius: 5px 5px 0px 0px ;" id="su-Btn">
        Sign Up
    </button>
</div>
<!-- log in form starts here  -->
<form action="" class="col-lg-5 d-none col-md-6 col-11 m-auto shadow rounded py-4" id="sign-in">
    <div class="w-100 my-3 mb-5">
        <h3 class="text-center">Welcome Back</h3>
        <p class="text-center text-secondary">login with your details to continue</p>
    </div>
    <div class="d-flex flex-column my-3 col-9 m-auto">
        <label class="mb-2" for="email">Email :</label>
        <input class="border-0 shadow-sm p-2" style="border: 0.3px solid black;" type="email" name="email" id="emailIn" placeholder="Email Address">
    </div>
    <div class="d-flex flex-column my-3 col-9 m-auto">
        <label class="mb-2" for="password" >Password :</label>
        <input class="border-0 shadow-sm p-2" style="border: 0.3px solid black;" type="password" name="password" id="passwordIn" placeholder="Password">
    </div>
    <p id="message2" class="text-danger text-center" style="font-size: 10px; margin-bottom: 0px;"></p>
    <div class="w-100 d-flex flex-column justify-content-center">
        <button class="my-2 mb-4 text-center w-50 border-0 rounded button1 mycolor py-1 m-auto">Log In</button>
    </div>
</form>
<!-- log in form ends here  -->
<!-- sign up form starts here  -->
<form action="" class="col-lg-5 col-md-6 col-11 m-auto shadow rounded py-2" id="sign-up">
    <div class="w-100 my-3 mb-2">
        <h3 class="text-center">Let's Get Started</h3>
        <p class="text-center text-secondary">add your personal details to continue</p>
    </div>
    <div class="d-flex flex-column my-2 col-9 m-auto">
        <label class="mb-2" for="email">Name :</label>
        <div class="w-100 d-flex">
            <input class="border-0 shadow-sm p-2 col-6 me-2" type="name1" name="name1" id="name1" placeholder="First Name">
        <input class="border-0 shadow-sm p-2 col-6" type="name2" name="name2" id="name2" placeholder="Last Name">
        </div>
        
    </div>
    <div class="d-flex flex-column my-2 col-9 m-auto">
        <label class="mb-2" for="email">Email :</label>
        <input class="border-0 shadow-sm p-2" type="email" name="email" id="email" placeholder="Email Address">
    </div>
   
    <div class="d-flex flex-column my-3 col-9 m-auto">
        <label class="mb-2" for="password" >Password :</label>
        <input class="border-0 shadow-sm p-2" type="password" name="password" id="password" placeholder="At Least 8 Characters, One Uppercase, And One Number">
    </div>
    <p id="message" class="text-danger text-center" style="font-size: 10px; margin-bottom: 0px;"></p>
    <div class="w-100 d-flex flex-column justify-content-center">
        <div class="d-flex justify-content-between col-9 m-auto">
            <button style="width: 45%;" class="my-2 mb-4 text-center bg-white  myborder rounded py-1 mycolor  m-auto">Reset</button>
        <button style="width: 45%;" class="my-2 mb-4 text-center  border-0 rounded button1 py-1 mycolor m-auto">Next</button></div>
        
    </div>
</form>
<!-- sign up form ends here  -->
<script src="{{asset('js/sign.js') }}" ></script>





</body>
</html>
