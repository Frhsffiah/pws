@extends('components.platinumLayout')

@section('platinum')

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Search Platinum Profiles</title>
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

    input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .btn {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        background-color: #007bff;
        color: #fff;
        text-align: center;
        display: block;
        margin: auto;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .profile-list {
        margin-top: 20px;
    }

    .profile-item {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 10px;
        cursor: pointer;
    }

    .profile-item:hover {
        background-color: #f0f0f0;
    }
</style>
</head>
<body>
<div class="container">
    <h2>Search Platinum Profiles</h2>
    <form id="searchForm" action="{{ route('platinum.search') }}" method="GET">
        <div class="form-group">
            <label for="searchName">Enter Name:</label>
            <input type="text" id="searchName" name="searchName" placeholder="Search by name...">
        </div>
        <div class="form-group">
            <button type="submit" class="btn">Search</button>
        </div>
    </form>
    <div class="profile-list">
        @if(isset($profiles) && count($profiles) > 0)
            @foreach($profiles as $profile)
                <div class="profile-item" onclick="viewProfile({{ $profile->RegID }})">
                    {{ $profile->R_FullName }}
                </div>
            @endforeach
        @elseif(isset($profiles))
            <p>No profiles found.</p>
        @endif
    </div>
</div>

<script>
function viewProfile(id) {
    window.location.href = '/platinum/profile/' + id;
}
</script>
</body>
</html>
@endsection
