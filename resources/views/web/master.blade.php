<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>@yield('title')</title>
</head>

<body>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <h2>Admin Page</h2>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('category') }}">Danh mục</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('product') }}">Món ăn</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('get-order') }}">Giỏ hàng</a>
        </li>
    </ul>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
