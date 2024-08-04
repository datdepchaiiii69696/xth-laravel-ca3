@extends('admin.layouts.master')

@section('title')
    Cập nhật danh mục
@endsection

@section('content')
    <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

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
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}">
        </div>

        <div class="mb-3">
            <label for="cover" class="form-label">Ảnh:</label>
            <input type="file" name="cover" id="cover" class="form-control">
            <div class="mt-2">
                @if($category->cover)
                    <div style="width: 50px; height: 50px;">
                        <img src="{{ Storage::url($category->cover) }}" style="max-width: 100%; max-height: 100%;" alt="Category Image">
                    </div>
                @else
                    <p>Chưa có ảnh</p>
                @endif
            </div>
        </div>

        <div class="mb-3">
            <label for="is_active" class="form-label">Trạng thái:</label>
            <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" @checked(old('is_active', $category->is_active))>
            <label for="is_active" class="form-check-label">Kích hoạt</label>
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>
    </form>
@endsection
