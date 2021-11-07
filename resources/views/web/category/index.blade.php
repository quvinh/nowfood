@extends('web.master')

@section('title')
Categories
@endsection

@section('content')
    <br>
    <a type="button" class="btn btn-primary" href="/create-category">Thêm danh mục</a>
    <br><br>
    <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">ID</th>
                <th scope="col">Tên loại</th>
                <th scope="col">Mô tả</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1
            @endphp
            @foreach($category as $item)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                        <a type="button" class="btn btn-secondary" href="{{ route('edit-category',$item->id) }}">Chỉnh sửa</a>
                        <span></span>
                        <a type="button" class="btn btn-danger" href="{{ route('delete-category',$item->id) }}">Xoá</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
