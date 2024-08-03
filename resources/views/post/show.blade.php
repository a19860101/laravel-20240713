<x-post-layout>
    <x-slot:title>{{$post->title}}</x-slot:title>
    <div class="container">
        <div class="row">
            <div class="col-12 border border-dark p-5 rounded">
                <h2>{{ $post->title }}</h2>
                <hr>
                <div>建立時間:{{ $post->created_at }}</div>
                <div>
                    作者：{{ $post->user->name }}
                </div>
                <div class="mb-3">
                    {{ $post->body }}
                </div>
                <hr>
                <div class="d-flex gap-3">
                    <a href="{{ route('post.index') }}" class="btn btn-info btn-sm">文章列表</a>
                    @auth
                    @if (Auth::id() == $post->user->id)
                    <form action="{{ route('post.delete', $post->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="刪除" onclick="return confirm('確認刪除？')" class="btn btn-danger btn-sm">
                    </form>
                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-success btn-sm">編輯文章</a>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-post-layout>
