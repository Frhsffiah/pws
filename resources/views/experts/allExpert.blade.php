@extends('components.platinumLayout')

@section('platinum')
<div class="container">
<h2>All Experts</h2>
<br>
    <!-- SEARCH FORM -->
    <div class="search-form">
        <form action="{{ route('experts.all') }}" method="GET" class="mb-3">
            <div class="search-group">
                <input type="text" name="search" class="search-input" placeholder="Search by domain">
                <div class="input-group-append">
                    <button type="submit" class="btn search-btn">Search</button>
                </div>
            </div>
        </form>
    </div>


    <!-- LIST OF EXPERTS -->
    
    <table class="expert-table">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Institution</th>
            <th>Email</th>
            <th>Phone</th>
            <th >Action</th>
        </tr>
        
        <!-- LOOP THROUGH EXPERTS -->
        @php $i = 0 @endphp <!-- Initialize $i outside of the loop -->
        @foreach ($allExperts as $expert)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $expert->eName }}</td>
                <td>{{ $expert->eInstitution }}</td>
                <td>{{ $expert->eEmail }}</td>
                <td>{{ $expert->ePhone }}</td>
                <td>
        
                <a class="btn view-btn" href="{{ route('experts.show', $expert->expertID) }}"> Show</a>
                   
                </td>
            </tr>
        @endforeach 
    </table>
</div>




    <style>
    .container {
        margin: 20px;
        position: relative;
    }

    .action-buttons {
        margin-bottom: 20px;
    }


    .alert-success {
        margin-bottom: 20px;
    }

    .search-form {
        margin-bottom: 20px;
    }

    .search-group {
        display: flex;
        align-items: center;
    }

    .search-input {
        flex: 1;
        padding: 8px 8px;
        border: 1px solid #ccc;
        border-radius: 10px;
        margin-right: 10px; /* Add margin to create gap */
        max-width: 1400px; /* Adjust the width as needed */
        
    }

    .search-btn {
        background-color: var(--pink-color);
        color: white;
        padding: 15px 15px;
        border: none;
        border-radius: 0 5px 5px 0;

    }

    .search-btn:hover {
        background-color: #575757;
    }

    .expert-table {
        width: 100%;
        border-collapse: collapse;
    }

    .expert-table th, .expert-table td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
    }

    .expert-table th {
        background-color: #f2f2f2;
    }

    .btn {
        color:white;
        padding: 8px 8px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-right: 5px; /* Add margin between buttons */
    }

    .view-btn {
        background-color: var(--pink-color);
        color: white;
        text-decoration: none;
   
        
    }

    .view-btn:hover {
        background-color: #575757;
    }

   
</style>
@endsection
