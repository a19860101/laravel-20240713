<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>什麼SHOP - {{$title}} </title>
</head>
<body>
    <nav>
        <a href="/">首頁</a>
        <a href="/news">最新消息</a>
        <a href="/about">關於我</a>
        <a href="#">主題企劃</a>
        <a href="#">配件飾品</a>
        <a href="#">包包提袋</a>
        <a href="#">居家生活</a>
    </nav>
    <h1>{{ $heading ?? '什麼shop 8/8隆重開幕'}}</h1>
    <div>
        {{$slot}}
    </div>
</body>
</html>