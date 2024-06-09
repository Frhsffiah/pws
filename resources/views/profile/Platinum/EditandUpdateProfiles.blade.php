@extends('components.platinumLayout')

@section('platinum')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Platinum Profile</title>
    <style>
        /* CSS styles */
        .container {
            margin: 0 auto;
            padding: 20px;
            max-width: 800px;
        }

        h2 {
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

        .btn {
            width: 30%; /* Adjust button width */
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            display: block;
            margin: auto; /* Center the button */
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Platinum Profile</h2>
        <form id="editProfileForm" action="{{ route('platinum.profile.update') }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Form fields -->
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
            <div class="form-group">
                <button type="submit" class="btn">Save Changes</button>
            </div>
        </form>
    </div>
</body>
</html>
@endsection
