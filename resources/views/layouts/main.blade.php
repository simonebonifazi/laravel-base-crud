<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CRUD</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <!-- JS -->
    <script defer="" src="{{asset('js/app.js')}}"></script>
</head>

<body>
    <header class="bg-light">
        <ul class="navbar-nav d-flex flex-row align-items-center">
            <li class="nav-item p-5">
                <a class="nav-link @if (Route::is('home')) active @endif" href="{{ url('/') }}"> Home </a>
            </li>
            <li class="nav-item p-5">
                <a class="nav-link @if (Route::is('comics.index')) active @endif" href="{{ route('comics.index') }} ">
                    Vista Fumetti </a>
            </li>
        </ul>
    </header>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>
</body>

</html>