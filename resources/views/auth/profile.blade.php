@extends('auth.app')
@section('title') Login @endsection
@section('content')
    <br><br>
    <div class="card">
        <div class="card-body">
            @if (Session::has('success'))
                <span class="text-danger">{{ Session::get('success') }}</span>
            @endif
            <form action="{{ route('profile') }}" method="post">
                @csrf
                @method('put')
                <div class="input-group mb-3">
                    <span class="input-group-text">Email</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{ auth()->user()->email }}" disabled>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Username</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="name" value="{{ auth()->user()->name }}">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-text">
                        <input class="form-check-input mt-0" type="checkbox" value="on" name="change_password">
                    </div>
                    <input type="password" class="form-control" aria-label="Text input with checkbox" name="password" placeholder="Change password">
                </div>
                <button class="btn btn-primary" type="submit">Cập nhật thông tin</button>
            </form>
            <br>
            <a class="btn btn-success" href="{{ route('home') }}">Trang chủ</a>
            <a class="btn btn-secondary" href="{{ route('logout') }}">Đăng xuất</a>
        </div>
    </div>

@endsection
