@extends('index.home')

@section('title')
    Product
@endsection

@section('content')
    <p>Name: {{ $product->name }}</p>
    <p>Price: {{ $product->price }}</p>
    <p>Description: {{ $product->description }}</p>
    <p>Quantity: {{ $product->quantity }}</p>
    <img style="width: 200px;" src="{{ asset('images/'.$product->image) }}" alt="IMAGE">
    <br>
    <a href="{{ route('index.buy', $product->id) }}">Buy</a>
    <br>
    <h3>comment</h3>
    <hr>
    @foreach($comment as $item)
        <h4>{{ $item->name }}</h4>
        <p>Comment: {{ $item->comment }}</p>
        <hr>
    @endforeach
    <form action="{{ route('index.store-comment') }}" method="post">
        @csrf
        <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
        <input type="text" name="product_id" value="{{ $product->id }}" hidden>
        <input type="text" name="comment" placeholder="Your comment">
        <input type="text" name="star" value="0">
        <button type="submit">Submit</button>
    </form>
@endsection
