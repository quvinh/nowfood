@extends('index.home')

@section('title')
    Buy product
@endsection

@section('content')
    <h2>Buy</h2>
    <br>
    <form action="{{ route('index.buy-product', $product->id) }}" method="post">
        @csrf
        <p>Name: {{ $product->name }}</p>
        <p>Price: <input id="price" type="text" name="price" value="{{ $product->price }}" readonly> vnd</p>
        <p>Quantity: <input id="quantity" type="text" name="quantity" onchange="onChange();" value="0"></p>
        <img style="width: 150px;" src="{{ asset('images/'.$product->image) }}" alt="IMAGE">
        <p>Ship: + 10 000 vnd</p>
        <p>Total price: <input type="text" name="total" id="total" readonly></p>
        <p>Description: {{ $product->description }}</p>
        <button type="submit">Buy</button>
    </form>

    <script>
        function onChange() {
            var price = document.getElementById('price');
            var quantity = document.getElementById('quantity');
            var total = document.getElementById('total');
            total.value = parseInt(price.value) * parseInt(quantity.value) + 10000;
        }
    </script>
@endsection
