<!-- resources/views/registration/Staff/view_register_page.blade.php -->
@extends('components.staffLayout')

@section('staff')
<!DOCTYPE html>
<html>
<head>
    <title>Registration Success</title>
    <!-- <link href="{{ asset('Module_1/register.css') }}" rel="stylesheet"> -->

    <style>

.container {
    margin: 0 auto;
    padding: 20px;
    max-width: 800px;
}

h1 {
    font-size: 28px;
    text-align: center;
    margin-bottom: 20px;
}

.search-input {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
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

.view-btn, .delete-btn {
    padding: 8px 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.view-btn {
    background-color: #007bff;
    color: #fff;
}

.delete-btn {
    background-color: #dc3545;
    color: #fff;
}

.delete-form {
    display: inline;
}





</style>

    <div class="container">
        <h1>Registration List</h1>
        <input type="text" id="search" placeholder="Search..." class="search-input">
        <table class="registration-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registers as $registers)
                    <tr>
                        <td>{{ $registers->RegID }}</td>
                        <td>{{ $registers->R_FullName }}</td>
                        <td>{{ $registers->R_Email }}</td>
                        <td>
                        <a href="{{ route('registers.show', $registers->RegID) }}" class="view-btn">View</a>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

   
@endsection
