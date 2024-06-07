@extends('components.mentorLayout')

@section('mentor')

<style>
    .container {
        padding: 20px;
        margin: 0 auto;
        max-width: 800px; /* Increased max-width for better table display */
    }

    h2 {
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    a {
        text-decoration: none;
        color: #007bff;
    }

    a:hover {
        text-decoration: underline;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        margin-top: 10px;
        text-align: center;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
    }

    .btn-blue {
        background-color: blue;
    }

    .btn-green {
        background-color: green;
    }

    .btn-red {
        background-color: red;
    }
</style>

<div class="container">
    <h2>View Registration Details</h2>
    <table>
        <tr>
            <th>Registration ID</th>
            <td>{{ $registers->RegID }}</td>
        </tr>
        <tr>
            <th>Type</th>
            <td>{{ $registers->R_Type }}</td>
        </tr>
        <tr>
            <th>Title</th>
            <td>{{ $registers->R_Title }}</td>
        </tr>
        <tr>
            <th>Full Name</th>
            <td>{{ $registers->R_FullName }}</td>
        </tr>
        <tr>
            <th>IC</th>
            <td>{{ $registers->R_IC }}</td>
        </tr>
        <tr>
            <th>Gender</th>
            <td>{{ $registers->R_Gender }}</td>
        </tr>
        <tr>
            <th>Religion</th>
            <td>{{ $registers->R_Religion }}</td>
        </tr>
        <tr>
            <th>Race</th>
            <td>{{ $registers->R_Race }}</td>
        </tr>
        <tr>
            <th>Citizenship</th>
            <td>{{ $registers->R_Citizenship }}</td>
        </tr>
        <tr>
            <th>Address</th>
            <td>{{ $registers->R_Address }}</td>
        </tr>
        <tr>
            <th>Phone Number</th>
            <td>{{ $registers->R_PhoneNum }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $registers->R_Email }}</td>
        </tr>
        <tr>
            <th>Facebook Name</th>
            <td>{{ $registers->R_FbName }}</td>
        </tr>
        <tr>
            <th>Current Education Level</th>
            <td>{{ $registers->R_CurrentEduLvl }}</td>
        </tr>
        <tr>
            <th>Education Field</th>
            <td>{{ $registers->R_EduField }}</td>
        </tr>
        <tr>
            <th>Education Institute</th>
            <td>{{ $registers->R_EduInstitute }}</td>
        </tr>
        <tr>
            <th>Occupation</th>
            <td>{{ $registers->R_Occupation }}</td>
        </tr>
        <tr>
            <th>Sponsorship</th>
            <td>{{ $registers->R_Sponsorship }}</td>
        </tr>
        <tr>
            <th>Program</th>
            <td>{{ $registers->R_Program }}</td>
        </tr>
        <tr>
            <th>Batch</th>
            <td>{{ $registers->R_Batch }}</td>
        </tr>
        <a href="{{ route('registers.show2', $registers->RegID) }}" class="view-btn">View</a>
    </table>
</div>
@endsection
