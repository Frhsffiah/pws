<!-- resources/views/registration/Staff/view_register_page.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Registration Success</title>
    <link href="{{ asset('Module_1/register.css') }}" rel="stylesheet">

    <style>
            .container{
                padding: 20px;
                margin: 0 auto;
                max-width: 800px;
            }

            .container h1{
               margin-bottom: 20px;
            }

            table{
               width: 100%;
               border-collapse: collapse;
               margin-top: 20px;
            }

            table, th, td{
                border: 1px solid #ddd;
            }

            th, td{
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

             

    </style>
</head>
<body>
    <div class="container">
        <h1>Registration Successful</h1>
        <table>
            <tr>
                <th>Field</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>RegID</td>
                <td>{{ $registers->RegID }}</td>
            </tr>
            <tr>
                <td>R_Type</td>
                <td>{{ $registers->R_Type }}</td>
            </tr>
            <tr>
                <td>R_Title</td>
                <td>{{ $registers->R_Title }}</td>
            </tr>
            <tr>
                <td>R_FullName</td>
                <td>{{ $registers->R_FullName }}</td>
            </tr>
            <tr>
                <td>R_IC</td>
                <td>{{ $registers->R_IC }}</td>
            </tr>
            <tr>
                <td>R_Gender</td>
                <td>{{ $registers->R_Gender }}</td>
            </tr>
            <tr>
                <td>R_Religion</td>
                <td>{{ $registers->R_Religion }}</td>
            </tr>
            <tr>
                <td>R_Race</td>
                <td>{{ $registers->R_Race }}</td>
            </tr>
            <tr>
                <td>R_Citizenship</td>
                <td>{{ $registers->R_Citizenship }}</td>
            </tr>
            <tr>
                <td>R_Address</td>
                <td>{{ $registers->R_Address }}</td>
            </tr>
            <tr>
                <td>R_PhoneNum</td>
                <td>{{ $registers->R_PhoneNum }}</td>
            </tr>
            <tr>
                <td>R_Email</td>
                <td>{{ $registers->R_Email }}</td>
            </tr>
            <tr>
                <td>R_FbName</td>
                <td>{{ $registers->R_FbName }}</td>
            </tr>
            <tr>
                <td>R_CurrentEduLvl</td>
                <td>{{ $registers->R_CurrentEduLvl }}</td>
            </tr>
            <tr>
                <td>R_EduField</td>
                <td>{{ $registers->R_EduField }}</td>
            </tr>
            <tr>
                <td>R_EduInstitute</td>
                <td>{{ $registers->R_EduInstitute }}</td>
            </tr>
            <tr>
                <td>R_Occupation</td>
                <td>{{ $registers->R_Occupation }}</td>
            </tr>
            <tr>
                <td>R_Sponsorship</td>
                <td>{{ $registers->R_Sponsorship }}</td>
            </tr>
            <tr>
                <td>R_Program</td>
                <td>{{ $registers->R_Program }}</td>
            </tr>
            <tr>
                <td>R_Batch</td>
                <td>{{ $registers->R_Batch }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
