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
    width: auto; /* Adjusted width to fit content */
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    background-color: #007bff;
    color: #fff;
    text-align: center;
    margin-left: 10px; /* Added margin for spacing */
}

.btn:hover {
    background-color: #0056b3;
}

.registration-table {
    width: 100%;
    border-collapse: collapse;
}

.registration-table th, .registration-table td {
    padding: 12px 15px;
    border: 1px solid #ddd;
    text-align: left;
}

.registration-table th {
    background-color: #f2f2f2;
}

.view-btn {
    background-color: #007bff;
    color: #fff;
}

.view-btn:hover {
    background-color: #0056b3;
}

</style>
</head>
<body>
<div class="container">
    <h2>Search Platinum Profiles</h2>
    <form id="searchForm" action="{{ route('platinum.search') }}" method="GET">
        <div class="form-group">
            <label for="searchName"></label>
            <input type="text" id="searchName" name="searchName" placeholder="Search by name...">
        </div>
        
    </form>

    @if(isset($profiles))
        <table class="registration-table">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($profiles as $profile)
                    <tr>
                        <td>{{ $profile->R_FullName }}</td>
                        <td>{{ $profile->R_Email }}</td>
                        <td>
                            <a href="{{ route('platinum.other.view', ['id' => $profile->RegID]) }}" class="btn view-btn">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
</body>
</html>
@endsection