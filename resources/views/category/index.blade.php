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
    <table>
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
</x-post-layout>