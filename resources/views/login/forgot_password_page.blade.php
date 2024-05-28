<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forgot Password</title>
    <link href="{{asset('Module_1/forgot.css')}}" rel="stylesheet">

</head>	
<body>

<div class="form-container">
    <form action="#" method="POST" class="form-wrap">
        <h2>Please enter your email for confirmation password</h2>
        <div class="form-box">
            <input type="text" placeholder="Enter Email" />
        </div>
        <div class="form-submit">
            <input type="submit" value="SUBMIT" />
        </div>
    </form>
</div>

<div class="popup-container" id="popupContainer" style="display: none;">
    <div class="popup">
        <p>Thankyou! We have sent a confirmation email to you.</p>
        <button class="close-btn">Close</button>
    </div>
</div>

<script>
document.querySelector('.form-wrap').addEventListener('submit', function(event) {
    event.preventDefault();
    // Simulate server-side validation
    setTimeout(function() {
        document.querySelector('.popup-container').style.display = 'block';
    }, 1000);
});

document.querySelector('.close-btn').addEventListener('click', function() {
    document.querySelector('.popup-container').style.display = 'none';
    window.location.href = "{{ route('resetPassword') }}";
});
</script>

</body>
</html>	