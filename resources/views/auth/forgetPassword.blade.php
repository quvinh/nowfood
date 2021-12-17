@extends('auth.app')
@section('title') Forget password @endsection
@section('content')
<main class="login-form">
    <div class="cotainer">
        <br><br>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reset Password</div>
                    <div class="card-body">
                        <br>
                        @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                        @endif

                        <form action="{{ route('forget.password.post') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail
                                    Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" required
                                        autofocus>
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div><br>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Send Password Reset Link</button><br><br>
                                <a class="btn btn-secondary" href="{{ route('login') }}">Sign in</a>
                                <a href="#">or</a>
                                <a class="btn btn-success" href="{{ route('register') }}">Sign up</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
