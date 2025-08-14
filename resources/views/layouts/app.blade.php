<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>APM - Aston Project Management</title>

    {{--Link to the main CSS stylesheet--}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    {{--Site header--}}
    <header>
        <h1>APM - Aston Project Management</h1>

        {{--Nav bar with conditional links based on login status--}}
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>

                {{--Show "Add Project" and "Logout" only if user is logged in--}}
                @if(Session::has('uid'))
                    <li><a href="http://{{ request()->getHost() }}:{{ request()->getPort() }}/projects/create">Add Project</a></li>
                    <li><a href="{{ url('/logout') }}">Logout ({{ Session::get('username') }})</a></li>
                @else
                    {{--Show "Login" and "Register" only if user is not logged in--}}
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @endif
            </ul>
        </nav>
    </header>

    {{--Flash messages--}}
    @if(session('success'))
        <div class="flash success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="flash error">
            {{ session('error') }}
        </div>
    @endif

    {{--Main content area injected from child views--}}
    <main>
        @yield('content')
    </main>

    {{--Footer with student name and id--}}
    <footer class="footer">
        <p>Shohib Ali - 250131949</p>
    </footer>
</body>
</html>