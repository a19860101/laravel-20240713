<x-post-layout>
    <x-slot:title>
        標籤管理
    </x-slot:title>
    <h2>標籤管理</h2>
    <style>
        table {
            border-collapse: collapse;
        }
        td,th {
            border: 1px solid #555;
            padding: 10px;
        }
    </style>
    <form action="{{route('tag.store')}}" method="post">
        @csrf
        <div>
            <label for="">標籤名稱</label>
            <input type="text" name="title">
        </div>
        <input type="submit" value="新增標籤">
    </form>
    <table>
        <tr>
            <th>標籤名稱</th>
            <th>建立日期</th>
            <th>動作</th>
        </tr>
        {{-- @foreach($categories as $c)
        <tr>
            <td>
                <form action="{{route('tag.destroy',$c->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="刪除" onclick="return confirm('確認刪除？')">
                </form>
            </td>
        </tr>
        @endforeach --}}
    </table>
</x-post-layout>