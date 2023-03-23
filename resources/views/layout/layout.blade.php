<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('public/app.css') }}">
    <link rel="icon" href="{{ asset('public/m.ico') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>@yield('title')</title>
</head>
<header class="header">
    @include('layout/header')
</header>

<body>
    <div class="content">
        @yield('content')
    </div>
</body>
<footer class="footer">
    @include('layout/footer')
</footer>

</html>