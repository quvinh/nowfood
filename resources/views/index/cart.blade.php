@extends('index.home')

@section('title')
    Cart
@endsection

@section('content')
    <h1>Cart</h1>
    <a href="{{ route('index.bill', Auth::user()->id) }}">BILL</a>
    @foreach($info as $item)
        <p>
            Name: {{ $item->name }}
            Price: {{ $item->price }}
            Quantity: {{ $item->quantity }}
            Total price: {{ $item->total }}
            <img style="width: 100px;" src="{{ asset('images/'.$item->image) }}" alt="IMAGE">
        </p>
        <form action="{{ route('index.buy-cart', $item->product_id) }}" method="post">
            @csrf
            <input type="text" name="product_id" value="{{ $item->id }}" hidden>
            <input type="text" name="total" value="{{ $item->total }}" hidden>
            <button type="submit">Buy</button>
        </form>
    @endforeach

@endsection
