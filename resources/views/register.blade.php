@extends('layouts.app')

@section('content')
    <h2>Register</h2>

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

    {{--Registration form--}}
    <form class="register-form" method="POST" action="{{ url('/register') }}">
        @csrf

        <div>
            <label>Username:</label>
            <input type="text" name="username" required>
        </div>

        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>

        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>

        <button class="btn" type="submit">Register</button>
    </form>


@endsection