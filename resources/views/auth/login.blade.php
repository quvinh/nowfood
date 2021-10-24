@extends('auth.app')
@section('title') Login @endsection
@section('content')
    <br><br>
    <h2>Login</h2>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="password">
                </div>
                <button class="btn btn-primary" type="submit">Login</button>
                <a class="btn btn-secondary" href="/register">Register</a>
            </form>
        </div>
    </div>
@endsection
