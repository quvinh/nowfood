@extends('web.master')

@section('title')
    Get card
@endsection

@section('content')
    @foreach($order as $item)
        <p>Name: {{ $item->product->name }}</p>
        <p>ID product: {{ $item->product->id }}</p>
        <p>ID order: {{ $item->id }}</p>
        <p>Price: {{ $item->product->price }} vnd</p>
        <p>Quantity: {{ $item->quantity }}</p>
        <br>
    @endforeach
    <a href="#">Payment on delivery</a>
@endsection
