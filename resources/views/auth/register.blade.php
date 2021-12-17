@extends('auth.app')
@section('title') Register @endsection
@section('content')
    <br><br>
    <div class="row">
        <div class="col" style="text-align: right;">
            <img src="{{ asset('images/img/register.png') }}" alt="IMAGE" width="60%">
        </div>
        <div class="col" style="background-color: rgb(255, 169, 119); border-radius: 4px;">
            <br><br>
            <h2>Đăng kí tài khoản</h2>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="name" class="form-control" name="name" placeholder="username">
                        </div><div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="password">
                        </div>
                        <button class="btn btn-primary" type="submit">Register</button>
                        <a class="btn btn-secondary" href="/login">Login</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
