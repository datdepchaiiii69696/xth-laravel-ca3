@extends('admin.layouts.master')

@section('title')
    Chi tiết danh mục
@endsection

@section('content')
    <ul>
        <li>Id: {{$category->id}}</li>
        <li>Tên: {{$category->name}}</li>
        <li>Ảnh:
            <div style="width: 100px; height: 100px;">
                <img src="{{$category->cover}}" alt="" width="100" height="100">
            </div>
        </li>
        <li>Trạng thái: {{$category->is_active}}</li>
    </ul>
    <ul>
        @foreach($category->toArray() as $key => $value)
            <li>{{$key}} : {{$value}}</li>
        @endforeach
    </ul>
@endsection
