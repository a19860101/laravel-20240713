<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>建立文章</h1>
    <div>
        {{-- <form action="/post" method="post"> --}}
        <form action="{{route('post.store')}}" method="post">
            @csrf
            <div>
                <label for="">文章標題</label>
                <input type="text" name="title">
            </div>
            <div>
                <label for="">分類</label>
                <select name="category_id" id="">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="">標籤</label>
                <input type="text" name="tag">
            </div>
            <div>
                <label for="">內文</label>
                <textarea name="body" id="" cols="30" rows="10"></textarea>
            </div>

            <input type="submit" value="建立文章">
        </form>
    </div>
</body>
</html>