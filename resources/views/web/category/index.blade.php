@extends('web.master')

@section('title')
    Categories
@endsection

@section('content')
    <a href="/create-category">new</a>
    <br>
    @foreach($category as $item)
        <p>Name category: {{ $item->name }}</p>
        <p>Description:{{ $item->description }}</p>
        <a href="/edit-category/{{ $item->id }}">edit</a>
        <a href="/delete-category/{{ $item->id }}">delete</a>
    @endforeach

@endsection
