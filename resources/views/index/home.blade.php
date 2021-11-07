<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>

<body>
    <div>
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <p>User: {{ Auth::user()->name }}</p>
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ route('logout') }}">Logout</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif
    </div>
    <br>
    <div>
        <a href="{{ route('index.cart') }}">CART</a>
        @yield('content')
    </div>
</body>

</html>
