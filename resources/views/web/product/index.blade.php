@extends('web.master')

@section('title')
    Product
@endsection

@section('content')
    <a href="/admin/create-product">Create</a>
    <br>
    @foreach($product as $item)
        <p>User ID: {{ Auth::user()->id }}</p>
        <p>ID product: {{ $item->id }}</p>
        <p>Name product: {{ $item->name }}</p>
        <p>Price product: {{ $item->price }} vnd</p>
        <form action="{{ route('store-order') }}" method="post">
            {{ csrf_field() }}
            <input type="text" name="product_id" value="{{ $item->id }}" hidden>
            <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
            <button type="submit">Add to card</button>
        </form>
        <!-- <a onclick="document.getElementById('addCard').submit();">Add</a> -->
        <!-- <a href="/store-order/{{ $item->id }}">Add</a> -->
        <a href="/admin/get-product/{{ $item->id }}">Info</a>
        <a href="/admin/edit-product/{{ $item->id }}">edit</a>
        <a href="/admin/delete-product/{{ $item->id }}">delete</a>
    @endforeach

    <!-- <p>User_id: {{ Auth::user()->id }}</p> -->
@endsection
