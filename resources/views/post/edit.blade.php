<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>修改文章</h1>
    <div>
        {{-- <form action="/post" method="post"> --}}
        <form action="{{route('post.update',$post->id)}}" method="post">
            @csrf
            @method('patch')
            <div>
                <label for="">文章標題</label>
                <input type="text" name="title" value="{{$post->title}}">
            </div>
            <div>
                <label for="">內文</label>
                <textarea name="body" id="" cols="30" rows="10">{{$post->body}}</textarea>
            </div>

            <input type="submit" value="儲存文章">
            <input type="button" value="取消" onclick="history.back()">
        </form>
    </div>
</body>
</html>