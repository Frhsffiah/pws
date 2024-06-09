@extends('components.mentorLayout')

@section('mentor')
    <div class="container">
        <h2>All Experts</h2>

        <!-- Search form -->
        <form action="{{ route('experts.mentor') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="domain" class="form-control" placeholder="Search by Domain">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        <!-- Expert list -->
        <ul class="list-group">
            @forelse ($experts as $expert)
                <li class="list-group-item">
                    <h4>{{ $expert->eName }}</h4>
                    <p>Institution: {{ $expert->eInstitution }}</p>
                    <p>Email: {{ $expert->eEmail }}</p>
                    <!-- Add more details as needed -->
                </li>
            @empty
                <li class="list-group-item">No experts found.</li>
            @endforelse
        </ul>

        <!-- Pagination links -->
        {{ $experts->links() }}
    </div>
@endsection
