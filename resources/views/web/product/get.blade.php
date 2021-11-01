@extends('web.master')

@section('title')
    info product
@endsection

@section('content')
    <p>Name: {{ $product->name }}</p>
    <p>Price: {{ $product->price }}</p>
    <p>Description: {{ $product->description }}</p>
    <p>Quantity: {{ $product->quantity }}</p>
    <img src="{{ asset('images/'.$product->image) }}" alt="IMAGE">
    <br>
    <a href="/admin/product">All product</a>
    <a href="/admin/edit-product/{{ $product->id }}">edit</a>
    <a href="/admin/delete-product/{{ $product->id }}">delete</a>
@endsection
