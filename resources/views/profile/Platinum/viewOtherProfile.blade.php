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
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btn {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .back-btn {
            background-color: #dc3545;
        }

        .back-btn:hover {
            background-color: #bd2130;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Platinum Profile</h1>
        <form id="editProfileForm" action="{{ route('platinum.other.view', ['id' => $registration->RegID]) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Display the profile details -->
        <div class="form-group">
                <label for="R_Title">Title</label>
                <input type="text" id="R_Title" name="R_Title" value="{{ $registration->R_Title }}">
            </div>
            <div class="form-group">
                <label for="R_FullName">Full Name</label>
                <input type="text" id="R_FullName" name="R_FullName" value="{{ $registration->R_FullName }}">
            </div>
            <div class="form-group">
                <label for="R_Address">Address</label>
                <input type="text" id="R_Address" name="R_Address" value="{{ $registration->R_Address }}">
            </div>
            <div class="form-group">
                <label for="R_PhoneNum">Phone Number</label>
                <input type="text" id="R_PhoneNum" name="R_PhoneNum" value="{{ $registration->R_PhoneNum }}">
            </div>
            <div class="form-group">
                <label for="R_Email">Email</label>
                <input type="email" id="R_Email" name="R_Email" value="{{ $registration->R_Email }}">
            </div>
            <div class="form-group">
                <label for="R_FbName">Facebook Name</label>
                <input type="text" id="R_FbName" name="R_FbName" value="{{ $registration->R_FbName }}">
            </div>
            <div class="form-group">
                <label for="R_EduInstitute">Education Institute</label>
                <input type="text" id="R_EduInstitute" name="R_EduInstitute" value="{{ $registration->R_EduInstitute }}">
            </div>
        
        <!-- Back button -->
        <a href="{{ route('platinum.search') }}" class="btn back-btn">Back</a>
    </form>
    </div>
</body>
</html>
@endsection