<x-post-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>更新文章</h3>
                {{-- <form action="/post" method="post"> --}}
                <form action="{{ route('post.update', $post->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="mb-3">
                        <label for="" class="form-label">文章標題</label>
                        <input type="text" name="title" value="{{ $post->title }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">分類</label>
                        <select name="category_id" id="" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">標籤</label>
                        <input type="text" name="tag" value="{{ $post->tagStr() }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">內文</label>
                        <textarea name="body" id="" cols="30" rows="10" class="form-control">{{ $post->body }}</textarea>
                    </div>

                    <input type="submit" value="儲存文章" class="btn btn-success btn-sm">
                    <input type="button" value="取消" onclick="history.back()" class="btn btn-outline-danger btn-sm">
                </form>
            </div>
        </div>
    </div>
</x-post-layout>
