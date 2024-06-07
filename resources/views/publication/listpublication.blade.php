@extends('components.platinumLayout')

@section('platinum')
<div class="container">
    <button class="back-btn" onclick="window.location.href='{{ url('Publication') }}'">BACK</button>
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
            
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <button class="edit-btn" onclick="">Edit</button>
                </td>
            </tr>
            
        </tbody>
    </table>
</div>

<style>
    .container {
        margin: 20px;
        position: relative;
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

    .back-btn {
        position: absolute;
        top: 0;
        right: 0;
        background-color: #f44336;
        color: white;
        padding: 10px 20px;
        margin: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .back-btn:hover {
        background-color: #d32f2f;
    }
</style>

<script>
    function editPublication(pubId) {
        // Redirect to the edit page with the publication ID
        window.location.href = `/editpublication/${pubId}`;
    }
</script>
@endsection


