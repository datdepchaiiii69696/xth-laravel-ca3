@extends('admin.layouts.master')

@section('title')
    Tạo mới danh mục
@endsection

@section('content')
    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Tên:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="cover" class="form-label">Ảnh:</label>
            <input type="file" name="cover" id="cover" class="form-control">
        </div>

        <div class="mb-3">
            <label for="is_active" class="form-label">Trạng thái:</label>
            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" {{ old('is_active', 1) ? 'checked' : '' }}>
            <label for="is_active" class="form-check-label">Kích hoạt</label>
        </div>

        <button type="submit" class="btn btn-success">Tạo mới</button>
    </form>
@endsection
