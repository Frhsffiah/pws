<!-- resources/views/viewMentorProfilePage.blade.php -->


<div class="container">
    <h1>Mentor Profile</h1>
    <div class="profile-details">
        <p><strong>Full Name:</strong> {{ $mentor->fullname }}</p>
        <p><strong>IC No:</strong> {{ $mentor->ic_no }}</p>
        <p><strong>Gender:</strong> {{ $mentor->gender }}</p>
        <p><strong>Phone Number:</strong> {{ $mentor->no_phone }}</p>
        <p><strong>Address:</strong> {{ $mentor->address }}</p>
        <p><strong>Email:</strong> {{ $mentor->email }}</p>
    </div>
    <a href="{{ route('editMentorProfile') }}">Update Profile</a>
</div>


@section('styles')
<style>
    .profile-details {
        margin-bottom: 20px;
    }
    .profile-details p {
        font-size: 1.2em;
    }
    .btn-primary {
        background-color: #007bff;
        border: none;
        padding: 10px 20px;
        color: white;
        text-decoration: none;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>
@endsection
