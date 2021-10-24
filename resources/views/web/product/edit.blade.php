@extends('web.master')

@section('title')
    Edit
@endsection

@section('content')
    <form action="{{ route('update-product', $product->id) }}" method="post">
        @csrf
        @method('put')
        <input type="text" name="category_id" value="{{ $product->category_id }}">
        <input type="text" name="name" value="{{ $product->name }}">
        <input type="text" name="price" value="{{ $product->price }}">
        <input type="text" name="description" value="{{ $product->description }}">
        <!-- code for edit image -->
        <button type="submit">Update</button>
    </form>
@endsection
