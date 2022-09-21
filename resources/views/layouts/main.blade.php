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
    <header class="bg-secondary">
        <h1> TEST</h1>
    </header>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>
</body>

</html>