<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link href="{{asset('Module_1/login.css')}}" rel="stylesheet">
</head>

<body>
    <div class="main">
    
        <h3>LOGIN</h3>
        <form action="">
            <label for="username">
                  Username:

              </label>
            <input type="text" id="username" name="username" placeholder="Enter your Username" required>

            <label for="password">
                  Password:
              </label>
            <input type="password" id="password" name="password" placeholder="Enter your Password" required>

            <label for="user">
                Type of User:
            </label>
            <select id="user" name="user" required>
                <option value="">Choose a user</option>
                <option value="staff">STAFF</option>
                <option value="student">PLATINUM</option>
                <option value="admin">MENTOR</option>
            </select>

            <div class="wrap">
                <button type="submit"
                        onclick="solve()">
                    LOGIN
                </button>
            </div>
        </form>
        <p>Forgot Password? 
              <a href="{{ route('forgotPassword') }}" style="text-decoration: none;"> Click here
            </a>
        </p>
    </div>

    <footer>
        &copy; e-Platinum World 2024 All Rights Reserved.
    </footer>
</body>

</html>