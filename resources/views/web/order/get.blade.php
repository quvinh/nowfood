@extends('web.master')

@section('title')
    Get card
@endsection

@section('content')
    <br>
    <h1>Thông tin Giỏ hàng</h1>
    <br><br>
    <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">ID Order</th>
                <th scope="col">ID User</th>
                <th scope="col">Tên món</th>
                <th scope="col">Đơn giá/món</th>
                <th scope="col">Số lượng đặt</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1
            @endphp
            @foreach($order as $item)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->user_id }}</td>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->product->price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>
                        <a type="button" class="btn btn-danger" href="{{ route('delete-order',$item->id) }}">Xoá</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
