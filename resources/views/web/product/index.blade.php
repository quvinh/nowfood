@extends('web.master')

@section('title')
    Product
@endsection

@section('content')
    <br>
    <a type="button" class="btn btn-primary" href="{{ route('create-product') }}">Thêm món ăn</a>
    <br><br>

    <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">ID</th>
                <th scope="col">Tên món</th>
                <th scope="col">Tên loại</th>
                <th scope="col">Đơn giá</th>
                <th scope="col">Image</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Số lượng</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1
            @endphp
            @foreach($product as $item)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td><img style="width: 100px;" src="{{ asset('images/'.$item->image) }}" alt=""></td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>
                        <a type="button" class="btn btn-secondary" href="{{ route('edit-product',$item->id) }}">Chỉnh sửa</a>
                        <span></span>
                        <a type="button" class="btn btn-danger" href="{{ route('delete-product',$item->id) }}">Xoá</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
