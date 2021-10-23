<form action="{{ route('profile') }}" method="post">
    @csrf
    @method('put')
    <input type="text" value="{{ auth()->user()->email }}" disabled>
    <input type="text" name="name" value="{{ auth()->user()->name }}">
    <input type="checkbox" name="change_password">
    <input type="password" name="password"><br>
    <button type="submit">Update</button>
</form>

<a href="{{ route('logout') }}">logout</a>
