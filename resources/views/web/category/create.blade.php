@extends('web.master')

@section('title')
    Create
@endsection

@section('content')
    <form action="{{ route('store-category') }}" method="post">
        @csrf
        <input type="text" name="user_id">
        <input type="text" name="name" placeholder="name">
        <input type="text" name="description" placeholder="description">
        <button type="submit">Create</button>
    </form>
@endsection
