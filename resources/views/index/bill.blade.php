@extends('index.home')

@section('title')
    Bill
@endsection

@section('content')
    <h1>Bill</h1>
    @foreach($bill as $item)
        <p>
            ID product: {{ $item->id }}
            Name: {{ $item->name }}
            Price: {{ $item->price }}
            Quantity: {{ $item->quantity }}
            Total price: {{ $item->payment }}
            @if($item->status == 0)
                <button>Item received</button>
            @endif
        </p>
    @endforeach
@endsection
