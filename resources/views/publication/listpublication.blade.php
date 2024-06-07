<!-- resources/views/listpublication.blade.php -->
@extends('components.platinumLayout')

@section('platinum')
<div class="container">
    <h2>List Publications</h2>
    <table class="publication-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Type</th>
                <th>Year</th>
                <th>Author</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($publications as $publication)
            <tr>
                <td>{{ $publication->Pub_Title }}</td>
                <td>{{ $publication->Pub_type }}</td>
                <td>{{ $publication->Pub_date }}</td>
                <td>{{ $publication->Pub_author }}</td>
                <td>
                    <button class="edit-btn" onclick="editPublication('{{ $publication->PubID }}')">Edit</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button class="back-btn" onclick="window.location.href='{{ route('landingpublication') }}'">BACK</button>
</div>

<style>
    .container {
        margin: 20px;
    }

    .publication-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .publication-table th, .publication-table td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
    }

    .publication-table th {
        background-color: #f2f2f2;
    }

    .edit-btn {
        background-color: #4CAF50;
        color: white;
        padding: 5px 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .edit-btn:hover {
        background-color: #45a049;
    }


