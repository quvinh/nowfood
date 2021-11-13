@extends('web.master')

@section('title')
    info product
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{ $product->name }}</h3>
            <p>Price: {{ $product->price }} VND</p>
            <p>Quantity: {{ $product->quantity }}</p>
            <img src="{{ asset('images/'.$product->image) }}" alt="IMAGE">
            <p>Description: {{ $product->description }}</p>
            <br>
            <a href="{{ route('product') }}">All product</a>
            <a href="{{ route('edit-product', $product->id) }}">Edit</a>
            <a href="{{ route('delete-product', $product->id) }}">Delete</a>
        </div>
    </div>
@endsection
