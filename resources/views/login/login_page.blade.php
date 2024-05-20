<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="main">
    
        <h3>Login</h3>
        <form action="">
            <label for="username">
                  USERNAME:
                  
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
                <option value="">Chose a user</option>
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
              <a href="#" style="text-decoration: none;"> Click here
            </a>
        </p>
    </div>

    <footer>
        &copy; e-Platinum World 2024 All Rights Reserved.
    </footer>
</body>

</html>