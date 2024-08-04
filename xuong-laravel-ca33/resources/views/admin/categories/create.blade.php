@extends('admin.layouts.master')

@section('title')
    Tạo mới danh mục
@endsection

@section('content')
    <form action="{{route('admin.categories.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="">Tên:</label>
            <input type="text" name="name">
        </div>
        <div class="mb-3">
            <label for="">Ảnh:</label>
            <input type="file" name="cover">
        </div>
        <div class="mb-3">
            <label for="">Trạng thái:</label>
            <input class="form-check-input" type="checkbox" value="1" name="is_active" checked>
        </div>
        <button type="submit" class="btn btn-success">Tạo mới</button>
    </form>
@endsection
