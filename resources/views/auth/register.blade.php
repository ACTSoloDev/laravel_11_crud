<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 350px;
        }
        h1 {
            margin-bottom: 25px;
            color: #333;
            text-align: center;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 6px;
            color: #555;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #007bff;
            outline: none;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error-messages {
            background: #f8d7da;
            color: #842029;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        p {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }
        a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Register</h1>

        @if ($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <label>Username:</label>
            <input type="text" name="username" value="{{ old('username') }}" required autofocus>

            <label>Password:</label>
            <input type="password" name="password" required>

            <label>Confirm Password:</label>
            <input type="password" name="password_confirmation" required>

            <button type="submit">Register</button>
        </form>

        <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
    </div>
</body>
</html>
