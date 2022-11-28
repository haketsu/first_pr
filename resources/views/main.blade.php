<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel=stylesheet" href="{{asset('css/app.css')}}">@vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" >Автостоянка</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Переключатель навигации">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{route('main.show_all')}}">Клиенты</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{route('main.show_all_carss')}}">Все авто</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{route('main.show_all_cars')}}">Авто на парковке</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('main.create')}}">Создать</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('funct')}}">Просмотр</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div>@yield('edit')</div>
        <div>@yield('create')</div>
        <div>@yield('index')</div>
        <div>@yield('editcars')</div>
        <div>@yield('createcars')</div>
        <div>@yield('indexcars')</div>
        <div>@yield('allcars')</div>
        <div>@yield('list')</div>
   </div>
</div>
</nav>
</body>
</html>
<html>
<body>

