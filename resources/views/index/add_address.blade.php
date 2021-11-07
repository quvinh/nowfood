@extends('index.home')

@section('title')
    Add address
@endsection

@section('content')
    <h1>Add address</h1>
    <form action="{{ route('index.store-address', $id) }}" method="post">
        @csrf
        <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
        <input type="text" name="fullname" placeholder="Full name">
        <input type="text" name="address" placeholder="Address">
        <input type="text" name="phone" placeholder="Phone">
        <button type="submit">Add address</button>
    </form>
@endsection
