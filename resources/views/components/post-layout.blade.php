<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>部落格 - {{ $title }} </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">???BLOG</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/post">文章列表</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/category">分類管理</a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/login">登入</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/login">註冊</a>
                    </li>
                    @endguest
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/dashboard">後台管理</a>
                    </li>
                    @endauth
                </ul>
                <ul class="navbar-nav ms-auto">
                    @auth
                    <li class="nav-item">
                        <a href="#" class="nav-link">{{Auth::user()->name}}</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <div class="container py-4">
        <h1 class="text-center">???BLOG</h1>
    </div>
    <div>
        {{ $slot }}
    </div>
</body>

</html>
