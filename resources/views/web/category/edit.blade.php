@extends('web.master')

@section('title')
    Edit
@endsection

@section('content')
    <form action="{{ route('update-category', $category->id) }}" method="post">
        @csrf
        @method('put')
        <input type="text" name="user_id" value="{{ $category->user_id }}">
        <input type="text" name="name" value="{{ $category->name }}">
        <input type="text" name="description" value="{{ $category->description }}">
        <button type="submit">Update</button>
    </form>
@endsection
