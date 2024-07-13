<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>什麼SHOP - {{ $title }} </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">???SHOP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">首頁</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/news">最新消息</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">關於我</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">主題企劃</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">配件飾品</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">包包提袋</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">居家生活</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <h1>{{ $heading ?? '什麼shop 8/8隆重開幕' }}</h1>
    <div>
        {{ $slot }}
    </div>
</body>

</html>
