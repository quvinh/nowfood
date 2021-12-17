@extends('index.home')

@section('title')
    Trang chủ
@endsection

@section('hero_area')
    @include('index.content.hero_area')
@endsection

@section('features_list')
    @include('index.content.features_list')
@endsection

@section('content')
    <!-- product section -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Fast</span> Food</h3>
                        <p>Nhanh chóng, tiện lợi, không phải đợi lâu</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @if($product->count() == 0)
                    <div class="d-flex justify-content-center">
                        <h6>Không có món nào :(</h6>
                    </div>
                @endif
                @foreach($product as $item)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ route('index.get-product', $item->id) }}"><img style="height: 200px;" src="{{ asset('images/'.$item->image) }}" alt=""></a>
                            </div>
                            <h3>{{ $item->name }}</h3>
                            <p class="product-price"><span>Per</span> {{ $item->price }} VND</p>
                            <form action="{{ route('store-order') }}" method="post">
                                @csrf
                                <input type="text" name="product_id" value="{{ $item->id }}" hidden>
                                @if(Route::has('login'))
                                    @auth
                                        <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                                    @endauth
                                @endif
                                @if($item->quantity > 0)
                                    <a type="button" class="cart-btn" href="{{ route('index.buy', $item->id )}}">Mua ngay</a>
                                    <!-- <a type="submit" class="cart-btn"><i class="fas fa-shopping-cart"></i></a> -->
                                    <button type="submit" class="btn btn-info"><i class="fas fa-shopping-cart"></i></button>
                                @else
                                    <button type="button" class="btn btn-danger">HẾT HÀNG</button>
                                @endif
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end product section -->
@endsection

@section('cart_banner')
    @include('index.content.cart_banner')
@endsection
