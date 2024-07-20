<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>文章列表</h1>
    <a href="/post/create">建立文章</a>
    <a href="{{route('post.create')}}">建立文章</a>

    @foreach($posts as $post)
    <div>
        <h2>{{$post->title}}</h2>
        <div>建立時間:{{$post->created_at}}</div>
        <div>
            {{$post->body}}
        </div>
        <a href="/post/{{$post->id}}">繼續閱讀</a>
        <a href="{{route('post.show',['id'=>$post->id])}}">繼續閱讀</a>
        <a href="{{route('post.show',$post->id)}}">繼續閱讀</a>
    </div>
    @endforeach
    
</body>
</html>