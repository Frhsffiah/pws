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
            @foreach ($publications as $publication)
            <tr>
                <td>{{ $publication->Pub_Title }}</td>
                <td>{{ $publication->Pub_type }}</td>
                <td>{{ $publication->Pub_date }}</td>
                <td>{{ $publication->Pub_author }}</td>
                <td>
                    <button class="edit-btn" onclick="editPublication('{{ $publication->PubID }}')">Edit</button>
                    <button class="view-btn" onclick="viewPublication('{{ $publication->PubID }}')">View</button>
                </td>
            </tr>
            @endforeach
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

    .edit-btn, .view-btn {
        background-color: var(--pink-color);
        color: white;
        padding: 5px 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .edit-btn:hover, .view-btn:hover {
        background-color: #575757;
    }

    .view-btn {
        background-color: var(--pink-color);
    }

    .view-btn:hover {
        background-color: #575757;
    }
</style>

<script>
    function editPublication(pubId) {
        // Redirect to the edit page with the publication ID
        window.location.href = `/editpublication/${pubId}`;
    }

    function viewPublication(pubId) {
        // Redirect to the view page with the publication ID
        window.location.href = `/viewpublication/${pubId}`;
    }
</script>
@endsection



