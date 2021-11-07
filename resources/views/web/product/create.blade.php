@extends('web.master')

@section('title')
    Create
@endsection

@section('content')
    <form action="{{ route('store-product') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="category_id" placeholder="category_id">
        <input type="text" name="name" placeholder="name">
        <input type="text" name="price" placeholder="price">
        <input type="text" name="description" placeholder="description">
        <input type="text" name="quantity" placeholder="quantity">
        <input type="file" name="image" placeholder="image">
        <button type="submit">Create</button>
    </form>
@endsection
