@extends('components.platinumLayout')

@section('platinum')

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Platinum Profile</title>
<style>
    /* CSS styles */
    .container {
        margin: 0 auto;
        padding: 20px;
        max-width: 800px;
    }

    h1 {
        font-size: 28px;
        text-align: center;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .view-btn, .delete-btn {
        padding: 8px 12px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .view-btn {
        background-color: #007bff;
        color: #fff;
    }

    .delete-btn {
        background-color: #dc3545;
        color: #fff;
    }

    .delete-form {
        display: inline;
    }

    .btn {
        width: 30%; /* Adjust button width */
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        background-color: #007bff;
        color: #fff;
        display: block; /* Add this to center the button */
        margin: auto; /* Add this to center the button */
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .alert {
        padding: 20px;
        background-color: #4CAF50; /* Green */
        color: white;
        margin-bottom: 15px;
    }

    .alert.success {background-color: #8fe3a5;}
    .alert.error {background-color: #f44336;}

    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }
</style>
</head>
<body>
<div class="container">
    @if(session('success'))
    <div class="alert success">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        {{ session('success') }}
    </div>
    @endif

    <h2>Platinum Profile</h2>
    <form id="editProfileForm" action="{{ route('platinum.profile') }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Form fields here, similar to the ones used for registration -->
        <div class="form-group">
            <label for="R_Title">Title</label>
            <input type="text" id="R_Title" name="R_Title" value="{{ $registration->R_Title }}" readonly>
        </div>
        <div class="form-group">
            <label for="R_FullName">Full Name</label>
            <input type="text" id="R_FullName" name="R_FullName" value="{{ $registration->R_FullName }}" readonly>
        </div>
        <div class="form-group">
            <label for="R_Address">Address</label>
            <input type="text" id="R_Address" name="R_Address" value="{{ $registration->R_Address }}" readonly>
        </div>
        <div class="form-group">
            <label for="R_PhoneNum">Phone Number</label>
            <input type="text" id="R_PhoneNum" name="R_PhoneNum" value="{{ $registration->R_PhoneNum }}" readonly>
        </div>
        <div class="form-group">
            <label for="R_Email">Email</label>
            <input type="email" id="R_Email" name="R_Email" value="{{ $registration->R_Email }}" readonly>
        </div>
        <div class="form-group">
            <label for="R_FbName">Facebook Name</label>
            <input type="text" id="R_FbName" name="R_FbName" value="{{ $registration->R_FbName }}" readonly>
        </div>
        <div class="form-group">
            <label for="R_EduInstitute">Education Institute</label>
            <input type="text" id="R_EduInstitute" name="R_EduInstitute" value="{{ $registration->R_EduInstitute }}" readonly>
        </div>
        <div class="form-group" style="text-align: center;">
            <a href="{{ route('platinum.profile.edit') }}" class="btn">EDIT</a>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const editProfileBtn = document.getElementById('editProfileBtn');
    const editProfileModal = document.getElementById('editProfileModal');
    const closeBtn = document.querySelector('.close-btn');

    editProfileBtn.addEventListener('click', function() {
        editProfileModal.style.display = 'block';
    });

    closeBtn.addEventListener('click', function() {
        editProfileModal.style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target === editProfileModal) {
            editProfileModal.style.display = 'none';
        }
    });
});
</script>
</body>
</html>
@endsection
