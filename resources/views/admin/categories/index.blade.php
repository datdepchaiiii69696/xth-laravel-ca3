@extends('admin.layouts.master')

@section('title')
    Danh sách danh mục
@endsection

@section('content')
    @if(session('message'))
        <h4>{{session('message')}}</h4>
    @endif

    <a href="{{route('admin.categories.create')}}">
        <button class="btn btn-success">Tạo mới</button>
    </a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Ảnh</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>
                    <div style="width: 50px;height: 50px;">
                        <img src="{{Storage::url($item->cover)}}" style="max-width: 100%; max-height: 100%;" alt="">
                    </div>
                </td>
                <td>
                    {!! $item->is_active ? '<span class="badge bg-success text-white">Hoạt động</span>'
                        : '<span class="badge bg-danger text-white">Không hoạt động</span>' !!}
                </td>
                <td>
                    <a href="{{route('admin.categories.show', $item)}}">
                        <button class="btn btn-info">Xem</button>
                    </a>
                    <a href="{{route('admin.categories.edit', $item)}}">
                        <button class="btn btn-success">Sửa</button>
                    </a>
                    <form action="{{route('admin.categories.destroy', $item)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
                            Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$data->links()}}
@endsection
