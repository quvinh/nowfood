@extends('web.master')

@section('title')
Bài viết
@endsection

@section('content')
    <br>
    <a type="button" class="btn btn-primary" href="{{ route('create-news') }}">Thêm bài viết</a>
    <br><br>
    <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">ID</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1
            @endphp
            @foreach($news as $item)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>
                        <a type="button" class="btn btn-success" href="{{ route('edit-news',$item->id) }}">Chỉnh sửa</a>
                        <span></span>
                        <a type="button" class="btn btn-danger" href="{{ route('delete-news',$item->id) }}">Xoá</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
