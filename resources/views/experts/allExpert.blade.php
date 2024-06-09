@extends('components.platinumLayout')

@section('platinum')
    <!-- SEARCH FORM -->
    <form action="{{ route('experts.all') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search by domain">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    <!-- LIST OF EXPERTS -->
    <h4>All Experts</h4>
    <table class="table table-bordered mt-3">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Institution</th>
            <th>Email</th>
            <th>Phone</th>
            <th width="280px">Action</th>
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
                    <form action="{{ route('experts.destroy', $expert->expertID) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('experts.show', $expert->expertID) }}">Show</a>
                    </form>
                </td>
            </tr>
        @endforeach 
    </table>
@endsection
