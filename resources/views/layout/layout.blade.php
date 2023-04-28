<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/app.css') }}">
    <link rel="icon" href="{{ asset('m.ico') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>@yield('title')</title>
</head>


<body>
    <header>
        @include('layout/header')
    </header>
    <div class="sub-header">
        @yield('sub-header')
    </div>
    <div class="wrapper">

        @isset ($leftbar)
        @if ($leftbar == 'on')
        <aside class="leftbar">
            @yield('leftbar')
        </aside>
        @endif
        @endisset

        <main class="content">
            @yield('content')
        </main>

    </div>
    <footer class="footer">
        <div class="center">
            @include('layout/footer')
        </div>
    </footer>
</body>

</html>