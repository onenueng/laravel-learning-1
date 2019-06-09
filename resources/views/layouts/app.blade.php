<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('/css/bootstrap-4.3.1/css/bootstrap.min.css')}}">
    <title>@yield('title')</title>
</head>
<body>
    <div class="container-fuild">
        @yield('content')
    </div>

    <footer>
        @yield('footer')
    </footer>
</body>
</html>