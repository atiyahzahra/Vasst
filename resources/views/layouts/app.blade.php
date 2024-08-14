<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="V-Asst - Your personal virtual assistant, always ready to help.">
    <title>@yield('title', 'VASST')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #4e54c8, #8f94fb); /* Gradient to match login page */
            margin: 0;
            padding: 0;
        }

        .navbar-custom {
            background-color: #1e2a38; /* Dark blue-grey theme */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar-custom .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: #ffffff; /* White color for text */
        }

        .navbar-custom .navbar-brand:hover {
            color: #d0d0d0;
        }

        .navbar-custom .navbar-nav .nav-item .nav-link {
            color: #ffffff;
        }

        .navbar-custom .navbar-nav .nav-item .nav-link:hover {
            color: #d0d0d0;
        }

        .footer {
            background-color: #1e2a38;
            color: #c5c6c7;
            text-align: center;
            padding: 15px;
            position: fixed;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
        }

        .footer p {
            margin: 0;
            font-size: 0.9rem;
        }

        .btn-custom {
            background-color: #4e54c8;
            color: #ffffff;
            padding: 12px 30px;
            border-radius: 50px;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #3a40a8;
            transform: translateY(-3px);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">VASST</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/profile') }}">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li> 
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container container">
        @yield('content')
    </div>

    <div class="footer">
        <p>&copy; {{ date('Y') }} Vasst. All rights reserved.</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
