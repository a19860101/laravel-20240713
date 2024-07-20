<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('category.store')}}" method="post">
        @csrf
        <div>
            <label for="">分類標題</label>
            <input type="text" name="title">
        </div>
        <div>
            <label for="">分類英文標題</label>
            <input type="text" name="slug">
        </div>
        <input type="submit" value="新增分類">
    </form>
</body>
</html>