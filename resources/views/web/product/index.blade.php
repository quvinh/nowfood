@extends('web.master')

@section('title')
    Product
@endsection

@section('content')
    <a href="/create-product">Create</a>
    <br>
    @foreach($product as $item)
        <p>Name product: {{ $item->name }}</p>
        <a href="/get-product/{{ $item->id }}">Info</a>
        <a href="/edit-product/{{ $item->id }}">edit</a>
        <a href="/delete-product/{{ $item->id }}">delete</a>
    @endforeach
@endsection
