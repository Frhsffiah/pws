
@extends('components.platinumLayout')

@section('platinum')

<div class="container">
    <h2>My Expert List</h2><br>
    <div class="action-buttons">
        <a class="btn add-btn" href="{{ route('experts.create.step1') }}">Add New Expert</a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <!-- SEARCH FORM -->
    <div class="search-form">
        <form action="{{ route('experts.index') }}" method="GET">
            <div class="search-group">
                <input type="text" name="search" class="search-input" placeholder="Search Experts">
                <button type="submit" class="btn search-btn">Search</button>
            </div>
        </form>
    </div>
    <!-- END SEARCH FORM -->

    <!-- LIST TABLE -->
    <table class="expert-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Institution</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 0 @endphp
            @foreach ($experts as $expert)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $expert->eName }}</td>
                    <td>{{ $expert->eInstitution }}</td>
                    <td>{{ $expert->eEmail }}</td>
                    <td>{{ $expert->ePhone }}</td>
                    <td>
                        <a class="btn view-btn" href="{{ route('experts.show', $expert->expertID) }}">View</a>
                        <a class="btn edit-btn" href="{{ route('experts.edit', $expert->expertID) }}">Edit</a>
                        <form action="{{ route('experts.destroy', $expert->expertID) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn delete-btn">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! $experts->links() !!}
</div>

<style>
    .container {
        margin: 20px;
        position: relative;
    }

    .action-buttons {
        margin-bottom: 20px;
    }

    .add-btn {
        background-color: var(--pink-color);
        color: white;
        padding: 8px 15px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
    }

    .add-btn:hover {
        background-color: #575757;
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

    .edit-btn, .view-btn {
        background-color: var(--pink-color);
        color: white;
        text-decoration: none;
        
    }

    .edit-btn:hover, .view-btn:hover {
        background-color: #575757;
    }

    .delete-btn {
       
        background-color: red;
        color: white;
    }

    .delete-btn:hover {
        background-color: darkred;
    }
</style>

@endsection

