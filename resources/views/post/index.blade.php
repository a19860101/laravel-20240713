<x-post-layout>
    <x-slot:title>
        文章列表
    </x-slot:title>
    <div class="container mb-5">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h2>文章列表</h2>
                {{-- <a href="/post/create">建立文章</a> --}}
                <a href="{{ route('post.create') }}" class="btn btn-primary btn-sm">建立文章</a>
            </div>
        </div>
    </div>
   

    {{-- {{dd($posts)}} --}}
    <div class="container">
        <div class="row gy-4">
            @foreach ($posts as $post)
                <div class="col-12 border border-secondary p-4 rounded">
                    <h2>{{ $post->title }}</h2>
                    <div>
                        作者： {{ $post->user->name }}
                    </div>
                    <div>
                        {{-- @php
                            $tagArray = [];
                            foreach($post->tags as $tag){
                                $tagArray[] = $tag->title;
                            }
                            
                        $tagStr = implode(',',  $tagArray);
                        @endphp --}}
                        標籤： {{ $post->tagStr() }}

                    </div>
                    <div>
                        分類 {{ $post->category->title }}
                    </div>
                    <div>建立時間:{{ $post->created_at }}</div>
                    <div>
                        {{ $post->body }}
                    </div>
                    {{-- <a href="/post/{{ $post->id }}">繼續閱讀</a> --}}
                    {{-- <a href="{{ route('post.show', ['id' => $post->id]) }}">繼續閱讀</a> --}}
                    <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary btn-sm">繼續閱讀</a>
                </div>
            @endforeach
        </div>
    </div>


</x-post-layout>
