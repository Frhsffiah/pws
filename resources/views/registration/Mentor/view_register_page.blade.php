@extends('components.mentorLayout')

@section('mentor')

<!DOCTYPE html>
<html>
<head>
    <title>Registration Success</title>
    <link href="{{ asset('Module_1/register.css') }}" rel="stylesheet">

    <style>
        .container {
            padding: 20px;
            margin: 0 auto;
            width: 2600px; /* Increased max-width for better table display */
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
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

        .view-btn {
            display: inline-block;
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
        }

        .view-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
    <h2>Registration List</h2>
    <table>
        <thead>
            <tr>
                <th>RegID</th>
                <th>R_Type</th>
                <th>R_Title</th>
                <th>R_FullName</th>
                <th>R_IC</th>
                <th>R_Gender</th>
                <th>R_Religion</th>
                <th>R_Race</th>
                <th>R_Citizenship</th>
                <th>R_Address</th>
                <th>R_PhoneNum</th>
                <th>R_Email</th>
                <th>R_FbName</th>
                <th>R_CurrentEduLvl</th>
                <th>R_EduField</th>
                <th>R_EduInsitute</th>
                <th>R_Occupation</th>
                <th>R_Sponsorship</th>
                <th>R_Program</th>
                <th>R_Batch</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($registers as $index => $registers)
                <tr>
                    <td>{{ $registers->RegID }}</td>
                    <td>{{ $registers->R_Type }}</td>
                    <td>{{ $registers->R_Title }}</td>
                    <td>{{ $registers->R_FullName }}</td>
                    <td>{{ $registers->R_IC }}</td>
                    <td>{{ $registers->R_Gender }}</td>
                    <td>{{ $registers->R_Religion }}</td>
                    <td>{{ $registers->R_Race }}</td>
                    <td>{{ $registers->R_Citizenship }}</td>
                    <td>{{ $registers->R_Address }}</td>
                    <td>{{ $registers->R_PhoneNum }}</td>
                    <td>{{ $registers->R_Email }}</td>
                    <td>{{ $registers->R_FbName }}</td>
                    <td>{{ $registers->R_CurrentEduLvl }}</td>
                    <td>{{ $registers->R_EduField }}</td>
                    <td>{{ $registers->R_EduInstitute}}</td>
                    <td>{{ $registers->R_Occupation }}</td>
                    <td>{{ $registers->R_Sponsorship }}</td>
                    <td>{{ $registers->R_Program }}</td>
                    <td>{{ $registers->R_Batch }}</td>
                    <td>
                        <a href="{{ route('registers.show2', $registers->RegID) }}">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection