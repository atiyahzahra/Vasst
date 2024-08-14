<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Virtual Assistant</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #4e54c8, #8f94fb);
            overflow: hidden; /* Prevents scrollbars */
        }

        .login-container {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(12px);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            width: 90%;
            max-width: 400px;
            text-align: center;
            box-sizing: border-box; /* Includes padding in width calculation */
        }

        .login-container h2 {
            margin-bottom: 1.5rem;
            color: #ffffff;
            font-size: 26px;
            font-weight: 600;
        }

        .input-group {
            margin-bottom: 1rem;
            position: relative;
        }

        .input-group input {
            width: 100%;
            padding: 12px 15px;
            border-radius: 8px;
            border: 1px solid #ffffff;
            background: rgba(255, 255, 255, 0.3);
            color: #ffffff;
            font-size: 16px;
            box-sizing: border-box; /* Ensures padding is included in the element's total width */
        }

        .input-group input::placeholder {
            color: #d0d0d0;
        }

        .input-group input:focus {
            background: rgba(255, 255, 255, 0.5);
            outline: none;
            box-shadow: 0 0 8px rgba(78, 84, 200, 0.5);
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background-color: #4e54c8;
            color: #ffffff;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .btn-login:hover {
            background-color: #3a40a8;
            transform: translateY(-2px);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .login-footer {
            margin-top: 1rem;
            color: #ffffff;
            font-size: 14px;
        }

        .login-footer a {
            color: #d0d0d0;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .login-footer a:hover {
            color: #ffffff;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        body {
            animation: fadeIn 1s ease-in;
        }

        /* Responsive design */
        @media (max-width: 600px) {
            .login-container {
                padding: 1.5rem;
                width: 90%;
                max-width: 350px;
            }

            .login-container h2 {
                font-size: 24px;
            }

            .input-group input {
                font-size: 14px;
                padding: 10px 12px;
            }

            .btn-login {
                font-size: 16px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Login</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="input-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn-login">Login</button>
        </form>
        <div class="login-footer">
            <p><a href="#">Forgot Password?</a></p>
            <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
        </div>
    </div>

</body>
</html>
