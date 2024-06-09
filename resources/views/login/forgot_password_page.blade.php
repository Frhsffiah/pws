<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="{{ asset('Module_1/forgot.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        h2 {
            color: #333;
            font-size: 20px;
            margin-bottom: 20px;
        }
        .form-box input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        .form-submit input[type="submit"] {
            width: 100%;
            padding: 10px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .form-submit input[type="submit"]:hover {
            background: #45a049;
        }
        .popup-container {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .popup {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .popup p {
            font-size: 16px;
            margin-bottom: 20px;
        }
        .close-btn {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .close-btn:hover {
            background: #45a049;
        }
    </style>
</head>
<body>

<div class="form-container">
    <form id="forgotPasswordForm" action="{{ route('handleForgotPassword') }}" method="POST" class="form-wrap">
        @csrf
        <h2>Please enter your email to reset your password</h2>
        <div class="form-box">
            <input type="text" name="email" placeholder="Enter Email" required />
        </div>
        <div class="form-submit">
            <input type="submit" value="SUBMIT" />
        </div>
    </form>
</div>

<div class="popup-container" id="popupContainer" style="display: none;">
    <div class="popup">
        <p id="popupMessage">Thank you! We have sent a confirmation email to you.</p>
        <button class="close-btn">Close</button>
    </div>
</div>

<script>
document.getElementById('forgotPasswordForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const form = event.target;
    const formData = new FormData(form);
    const csrfToken = document.querySelector('input[name="_token"]').value;

    fetch(form.action, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
        },
        body: formData
    })
    .then(response => {
        return response.json().then(data => ({ status: response.status, body: data }));
    })
    .then(({ status, body }) => {
        console.log('Response Status:', status);
        console.log('Response Body:', body);
        if (status === 200) {
            document.getElementById('popupMessage').textContent = body.status || 'Thank you! We have sent a confirmation email to you.';
            document.getElementById('popupContainer').style.display = 'flex';
        } else {
            alert(body.error || 'An error occurred. Please try again.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An unexpected error occurred. Please try again.');
    });
});

document.querySelector('.close-btn').addEventListener('click', function() {
    document.getElementById('popupContainer').style.display = 'none';
    window.location.href = "{{ route('loginPage') }}"; // Redirect to login page
});
</script>

</body>
</html>
