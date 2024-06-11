@extends('components.mentorLayout')
@section('mentor')
<style>
    .search-container {
        margin: 50px auto;
        width: 60%;
        padding: 20px;
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: normal;
    }
    .search-container h2 {
        margin-bottom: 20px;
        font-size: 22px;
        font-weight: bold;
    }
    .search-input {
        width: 80%;
        padding: 10px;
        margin-bottom: 20px;
    }
    .search-button {
        padding: 10px 20px;
        background-color: var(--purple-color);
        color: #ffffff;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .search-button:hover {
        background-color: #575757;
    }
    .results-container {
        margin-top: 20px;
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
    .view-btn {
        background-color: var(--purple-color);
        color: white;
        padding: 5px 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .view-btn:hover {
        background-color: #45a049;
    }

    .view-btn {
        background-color: var(--purple-color);
    }

    .view-btn:hover {
        background-color: #1976D2;
    }

    .generate-btn {
    display: inline-block;
    padding: 8px 15px;
    background-color: var(--purple-color);
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    margin-left: 10px; /* Adjust the margin as needed */
}

.generate-btn:hover {
    background-color: #575757;
}

.generate-btn i {
    margin-right: 5px; /* Adjust the icon margin as needed */
}

.publication-header h2 {
    display: inline-block;
}


</style>
<div class="main-header">
    <h2>Publications</h2>
</div>
<div class="search-container">
    <h2>Search Publications</h2>
    <form method="GET" action="{{ route('Publication.searchMentor') }}">
        <input type="text" name="query" class="search-input" placeholder="Publication values For Filter Table @ Search">
        <button type="submit" class="search-button">Search & Filter</button>
    </form>

    @if(isset($publications))
    <div class="results-container">
        <div class="publication-header">
            <h2>List Publications</h2>
            <a href="{{ route('Publication.print')}}" target="_blank" class="generate-btn"><i class="fa-solid fa-print"></i></i> Generate</a>
        </div>
        <table id="publication-table" class="publication-table">
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
                <a href="{{ route('Publication.viewMentor', ['id' => $publication->PubID]) }}" class="view-btn">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    @endif
</div>




@endsection

