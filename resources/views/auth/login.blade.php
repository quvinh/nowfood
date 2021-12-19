@extends('auth.app')
@section('title') Login @endsection
@section('content')
    <br><br>
    <div class="row">
        <div class="col" style="text-align: right;">
            <a href="{{ route('home') }}"><img src="{{ asset('images/img/login.jpg') }}" alt="IMAGE"></a>
        </div>
        <div class="col" style="background-color: rgb(119, 255, 255); border-radius: 4px;">
            <br><br>
            <h2>Đăng nhập</h2>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" name="password" placeholder="password">
                        </div>
                        <button class="btn btn-primary" type="submit">Đăng nhập</button>
                        <a class="btn btn-secondary" href="/register">Đăng kí</a>
                        <br>
                        <a href="{{ route('forget.password.get') }}">Quên mật khẩu?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
