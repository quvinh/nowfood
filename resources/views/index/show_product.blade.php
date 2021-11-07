@extends('index.home')

@section('title')
    Home
@endsection

@section('content')

    @foreach($product as $item)
        @if(Route::has('login'))
            @auth
                <p>User ID: {{ Auth::user()->id }}</p>
            @endauth

        @endif
        <p>ID product: {{ $item->id }}</p>
        <p>Name product: {{ $item->name }}</p>
        <p>Price product: {{ $item->price }} vnd</p>
        <form action="{{ route('store-order') }}" method="post">
            {{ csrf_field() }}
            <input type="text" name="product_id" value="{{ $item->id }}" hidden>
            @if(Route::has('login'))
                @auth
                    <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                @endauth
            @endif
            <button type="submit">Add to card</button>
        </form>
        <a href="{{ route('index.get-product', $item->id) }}">Info</a>
        <a href="{{ route('index.buy', $item->id )}}">Buy</a>
    @endforeach
@endsection
