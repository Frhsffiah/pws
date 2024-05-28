<!DOCTYPE html>
<html>
<head>
    <title>Registration Success</title>
    <link href="{{ asset('Module_1/register.css') }}" rel="stylesheet">

    <div class="DT_Form1">
    <h2>Draft Theses List</h2>
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
            </tr>
        </thead>
        <tbody>
        @foreach ($registers as $index => $registers)
                <tr>
                    <td>{{ $index + 1 }}</td>
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
                    <td>{{ $registers->R_EduInsitute}}</td>
                    <td>{{ $registers->R_Occupation }}</td>
                    <td>{{ $registers->R_Sponsorship }}</td>
                    <td>{{ $registers->R_Program }}</td>
                    <td>{{ $registers->R_Batch }}</td>
                    <td>
                        <a href="{{ route('registers.show', $registers->RegID) }}">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('registers.create') }}" class="btn btn-blue">New Registration</a>
</div>