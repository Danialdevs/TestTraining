<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container py-3">
    <header>
        <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center link-body-emphasis text-decoration-none">
                <span class="fs-4">Подготовка к тестированию</span>
            </a>

            <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
               @guest()
                    <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="{{route('auth')}}">Вход</a>
                    <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="{{route('register')}}">Регистрация</a>
                @endguest
                @auth()
                       <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="{{route('logout')}}">Выйти</a>
                       <a class="me-3 py-2 link-body-emphasis text-decoration-none" >{{\Illuminate\Support\Facades\Auth::user()->school->name}}</a>
                       <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="{{route('subjects-list')}}">Предметы</a>

                   @endauth

            </nav>
        </div>

    </header>

    <main>
        @yield('content')
    </main>


</div>
</body>
</html>


