<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link href="{{ asset('Module_1/login.css') }}" rel="stylesheet">
</head>

<body>
    <div class="main">
        <h3>LOGIN</h3>
        <form action="{{ route('LoginPost') }}" method="POST">
            @csrf

            <!-- Display Success Message -->
        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

            @if ($errors->any())
                <div class="error-message">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your Email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your Password" required>

            <label for="user">Type of User:</label>
            <select id="user" name="user" required>
                <option value="">Choose a user</option>
                <option value="staff">STAFF</option>
                <option value="platinum">PLATINUM</option>
                <option value="mentor">MENTOR</option>
            </select>

            <div class="wrap">
                <button type="submit">LOGIN</button>
            </div>
        </form>
        <p>Forgot Password? 
              <a href="{{ route('forgotPassword') }}" style="text-decoration: none;"> Click here</a>
        </p>
    </div>

    <footer>
        &copy; e-Platinum World 2024 All Rights Reserved.
    </footer>
</body>

</html>
