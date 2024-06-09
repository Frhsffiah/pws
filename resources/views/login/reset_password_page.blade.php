<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f2f2f2;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .error-message {
            color: red;
            font-size: 0.9em;
            display: none;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Reset Password</h2>
    <form id="resetPasswordForm" action="{{ route('handleResetPassword') }}" method="POST" onsubmit="return validatePasswords()">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group">
            <label for="newPassword">Enter New Password</label>
            <input type="password" id="newPassword" name="password" required>
        </div>
        <div class="form-group">
            <label for="confirmPassword">Re-enter New Password</label>
            <input type="password" id="confirmPassword" name="password_confirmation" required>
        </div>
        <div class="error-message" id="errorMessage">Passwords do not match.</div>
        <button type="submit">Submit</button>
    </form>
</div>
<script>
    function validatePasswords() {
        const newPassword = document.getElementById('newPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        const errorMessage = document.getElementById('errorMessage');

        if (newPassword !== confirmPassword) {
            errorMessage.style.display = 'block';
            return false;
        }
        errorMessage.style.display = 'none';
        return true;
    }
</script>
</body>
</html>
