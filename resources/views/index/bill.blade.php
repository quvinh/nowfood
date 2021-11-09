@extends('index.home')

@section('title')
    Bill
@endsection

@section('content')
    <h1>Bill</h1>
    @foreach($bill as $item)
        <p>
            ID product: {{ $item->product_id }}
            Name: {{ $item->name }}
            Price: {{ $item->price }}
            Quantity: {{ $item->quantity }}
            Total price: {{ $item->payment }}
            Status: {{ $item->status }}
            <form action="{{ route('index.store-inforcheckout', $item->id) }}" method="post">
                @csrf
                <button type="submit">Item received</button>
            </form>
        </p>
    @endforeach
@endsection
