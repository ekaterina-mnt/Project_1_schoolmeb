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
        <nav>
        @auth("admin")
        <form action="{{ route('admin.courses.index') }}">
            <button class="border logout">
                курсы
            </button>
        </form>
        @endauth

        @auth("admin")
        <form action="{{ route('admin.logout') }}">
            <button class="border logout">
                выйти
            </button>
        </form>
        @endauth
        </nav>
    </header>

    @if(session('flash') !== null)
    <div class="flash">
        @if (session('flash'))
        {{ session('flash') }}
        @endif
    </div>
    @endif

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

    <script src="app.js"></script>
</body>

</html>