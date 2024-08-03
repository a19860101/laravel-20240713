<x-post-layout>
    <x-slot:title>
        分類管理
    </x-slot:title>
    <style>
        table {
            border-collapse: collapse;
        }
        td,th {
            border: 1px solid #555;
            padding: 10px;
        }
    </style>
    <div class="container">
        <div class="row">
           
            <div class="col-9">
                <h3>所有分類</h3>
                <table class="table">
                    <tr>
                        <th>分類標題</th>
                        <th>分類英文標題</th>
                        <th>建立日期</th>
                        <th>動作</th>
                        <th>動作</th>
                    </tr>
                    @foreach($categories as $c)
                    <tr>
                        <form action="{{route('category.update',$c->id)}}" method="post">
                            @csrf
                            @method('put')
                            <td><input type="text" name="title" value="{{$c->title}}"></td>
                            <td><input type="text" name="slug" value="{{$c->slug}}"></td>
                            <td>{{$c->created_at}}</td>
                            <td><input type="submit" value="更新"></td>
                        </form>
                        <td>
                            <form action="{{route('category.destroy',$c->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" value="刪除" onclick="return confirm('確認刪除？')">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="col-3">
                <h3>新增分類</h3>
                <form action="{{route('category.store')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">分類標題</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">分類英文標題</label>
                        <input type="text" name="slug" class="form-control">
                    </div>
                    <input type="submit" value="新增分類" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
    
</x-post-layout>