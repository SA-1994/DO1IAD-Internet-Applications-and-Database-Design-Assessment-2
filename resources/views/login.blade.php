@extends('layouts.app')

@section('content')
    <h2>Login</h2>

    {{--Display validation errors--}}
    @if ($errors->any())
        <div class="flash error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{--Login form--}}
    <form class="login-form" method="POST" action="{{ url('/login') }}">
        @csrf

        <div>
            <label>Username:</label>
            <input type="text" name="username" required>
        </div>

        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>

        <button class="btn" type="submit">Login</button>
    </form>
@endsection