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
        max-width: 800px;
        margin: auto;
        padding: 20px;
    }

    .profile-details {
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 10px;
        background-color: #f9f9f9;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        border-radius: 10px;
    }

    .close-btn {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close-btn:hover,
    .close-btn:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>
</head>
<body>
<div class="container">
    <h1>Platinum Profile</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- viewPlatinumProfilePage.blade.php -->
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
        max-width: 800px;
        margin: auto;
        padding: 20px;
    }

    .profile-details {
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 10px;
        background-color: #f9f9f9;
        margin-bottom: 20px;
    }

    .btn {
        display: inline-block;
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>
<div class="container">
    <h1>Platinum Profile</h1>
    <div class="profile-details">
        <p><strong>Title:</strong> {{ $registration->R_Title }}</p>
        <p><strong>Full Name:</strong> {{ $registration->R_FullName }}</p>
        <p><strong>Address:</strong> {{ $registration->R_Address }}</p>
        <p><strong>Phone Number:</strong> {{ $registration->R_PhoneNum }}</p>
        <p><strong>Email:</strong> {{ $registration->R_Email }}</p>
        <p><strong>Facebook Name:</strong> {{ $registration->R_FbName }}</p>
        <p><strong>Current Education Level:</strong> {{ $registration->R_CurrentEduLvl }}</p>
        <p><strong>Education Field:</strong> {{ $registration->R_EduField }}</p>
        <p><strong>Education Institute:</strong> {{ $registration->R_EduInstitute }}</p>
        <p><strong>Occupation:</strong> {{ $registration->R_Occupation }}</p>
        <p><strong>Sponsorship:</strong> {{ $registration->R_Sponsorship }}</p>
        <p><strong>Program:</strong> {{ $registration->R_Program }}</p>
        <p><strong>Batch:</strong> {{ $registration->R_Batch }}</p>
    </div>
    <a href="{{ route('platinum.profile.edit', $registration->RegID) }}" class="btn btn-blue">Edit Profile</a>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // JavaScript logic for any functionality here
});
</script>
</body>
</html>
@endsection
<div class="profile-details">
        <p><strong>Title:</strong> {{ $registration->R_Title }}</p>
        <p><strong>Full Name:</strong> {{ $registration->R_FullName }}</p>
        <p><strong>Address:</strong> {{ $registration->R_Address }}</p>
        <p><strong>Phone Number:</strong> {{ $registration->R_PhoneNum }}</p>
        <p><strong>Email:</strong> {{ $registration->R_Email }}</p>
        <p><strong>Facebook Name:</strong> {{ $registration->R_FbName }}</p>
        <p><strong>Current Education Level:</strong> {{ $registration->R_CurrentEduLvl }}</p>
        <p><strong>Education Field:</strong> {{ $registration->R_EduField }}</p>
        <p><strong>Education Institute:</strong> {{ $registration->R_EduInstitute }}</p>
        <p><strong>Occupation:</strong> {{ $registration->R_Occupation }}</p>
        <p><strong>Sponsorship:</strong> {{ $registration->R_Sponsorship }}</p>
        <p><strong>Program:</strong> {{ $registration->R_Program }}</p>
        <p><strong>Batch:</strong> {{ $registration->R_Batch }}</p>
    </div>
    <button id="editProfileBtn" class="btn btn-blue">Edit Profile</button>
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
