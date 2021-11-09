@extends('index.home')

@section('title')
    Checkout
@endsection

@section('content')
    @foreach($info as $item)
        <hr>
        <p>{{ $item->name_product }}</p>
    @endforeach
@endsection
