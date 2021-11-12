@extends('index.home')

@section('title')
    Bill
@endsection

@section('hero_area')
    <!-- hero area -->
    <div class="hero-area hero-bg" style="height: 100px;">
    </div>
    <!-- end hero area -->
@endsection

@section('features_list')
    @include('index.content.features_list')
@endsection

@section('content')
    <div class="cart-table-wrap">
        <table class="cart-table">
            <thead class="cart-table-head">
                <tr class="table-head-row">
                    <!-- <th class="product-remove"></th> -->
                    <th class="product-image">Ảnh sản phẩm</th>
                    <th class="product-name">Tên món</th>
                    <th class="product-price">Đơn giá</th>
                    <th class="product-quantity">Số lượng</th>
                    <th class="product-total">Tổng giá</th>
                    <th>Click khi nhận được hàng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bill as $item)
                    <tr class="table-body-row">
                        <!-- <td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td> -->
                        <td class="product-image"><img src="{{ asset('images/'.$item->image) }}" alt=""></td>
                        <td class="product-name">{{ $item->name }}</td>
                        <td class="product-price">{{ $item->price }} VND</td>
                        <td class="product-quantity"><input type="number" placeholder="{{ $item->quantity }}" readonly></td>
                        <td class="product-total">{{ $item->payment }} VND</td>
                        <td>
                            <form action="{{ route('index.store-inforcheckout', $item->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary">Xác nhận đã nhận hàng</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
