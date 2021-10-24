@extends('web.master')

@section('title')
    info product
@endsection

@section('content')
    <p>Name: {{ $product->name }}</p>
    <p>Price: {{ $product->price }}</p>
    <p>Description: {{ $product->description }}</p>
    <img src="{{ asset('images/'.$product->image) }}" alt="IMAGE">
    <br>
    <a href="/product">All product</a>
    <a href="/edit-product/{{ $product->id }}">edit</a>
    <a href="/delete-product/{{ $product->id }}">delete</a>
@endsection
