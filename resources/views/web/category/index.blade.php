@extends('web.master')

@section('title')
    Categories
@endsection

@section('content')
    <a href="/create-category">new</a>
    <br>
    @foreach($category as $item)
        <p>{{ $item->name }}</p>
        <p>{{ $item->user->name }}</p>
    @endforeach
    <a href="/edit-category">edit</a>
    <a href="/delete-category">delete</a>
@endsection
