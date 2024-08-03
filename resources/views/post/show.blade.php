<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>{{$post->title}}</h2>
    <div>建立時間:{{$post->created_at}}</div>
    <div>
        作者：{{$post->user->name}}
    </div>
    <div>
        {{$post->body}}
    </div>
    <a href="{{route('post.index')}}">文章列表</a>
    @auth
    @if(Auth::id() == $post->user->id)
    <form action="{{route('post.delete',$post->id)}}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="刪除" onclick="return confirm('確認刪除？')">
    </form>
    <a href="{{route('post.edit',$post->id)}}">編輯文章</a>
    @endif
    @endauth
</body>
</html>