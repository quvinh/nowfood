@extends('web.master')

@section('title')
    Edit
@endsection

@section('content')
    <form action="{{ route('update-product', $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <input type="text" name="category_id" value="{{ $product->category_id }}" required>
        <input type="text" name="name" value="{{ $product->name }}" required>
        <input type="text" name="price" value="{{ $product->price }}" required>
        <input type="text" name="description" value="{{ $product->description }}" required>
        <input type="text" name="quantity" value="{{ $product->quantity }}" required>
        <input type="file" name="image" required>
        <p>{{ $product->image }}</p>
        <button type="submit">Update</button>
    </form>
@endsection
