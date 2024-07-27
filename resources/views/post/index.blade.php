<x-post-layout>
    <x-slot:title>
        文章列表
    </x-slot:title>
    <h1>文章列表</h1>
    <a href="/post/create">建立文章</a>
    <a href="{{route('post.create')}}">建立文章</a>

    {{-- {{dd($posts)}} --}}
    @foreach($posts as $post)
    <div>
        <h2>{{$post->title}}</h2>
        <div>
            作者： {{$post->user->name}}
        </div>
        <div>
            分類 {{$post->category->title}}
        </div>
        <div>建立時間:{{$post->created_at}}</div>
        <div>
            {{$post->body}}
        </div>
        <a href="/post/{{$post->id}}">繼續閱讀</a>
        <a href="{{route('post.show',['id'=>$post->id])}}">繼續閱讀</a>
        <a href="{{route('post.show',$post->id)}}">繼續閱讀</a>
    </div>
    @endforeach
    
</x-post-layout>