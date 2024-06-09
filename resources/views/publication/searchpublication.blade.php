@extends('components.platinumLayout')
@section('platinum')
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
        background-color: var(--pink-color);
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
    .publication {
        padding: 10px;
        border-bottom: 1px solid #dddddd;
    }
    .publication h3 {
        margin: 0;
        font-size: 18px;
        font-weight: bold;
    }
    .publication p {
        margin: 5px 0;
    }

    .view-button {
        padding: 5px 10px;
        background-color: var(--pink-color);
        color: #ffffff;
        border: none;
        cursor: pointer;
        transition: background-color 0.1s ease;
    }
    .view-button:hover {
        background-color: #575757;
    }

</style>

<div class="search-container">
    <h2>Search Publications</h2>
    <form method="GET" action="{{ route('Publication.search') }}">
        <input type="text" name="query" class="search-input" placeholder="Enter publication title or type">
        <button type="submit" class="search-button">Search</button>
    </form>

    @if(isset($publications) && $publications->isNotEmpty())
    <div class="results-container">
        @foreach($publications as $publication)
        <div class="publication">
            <div>
                <h3>{{ $publication->Pub_Title }}</h3>
                <p>Author: {{ $publication->Pub_author }}</p>
                <p>Type: {{ $publication->Pub_type }}</p>
                <p>Date: {{ $publication->Pub_date }}</p>
                <p>DOI: {{ $publication->Pub_DOI }}</p>
            </div>
            <a href="{{ route('Publication.view', $publication->PubID) }}" class="view-button">View</a>
        </div>
        @endforeach
    </div>
    @elseif(isset($publications))
    <div class="results-container">
        <h3>No results found.</h3>
    </div>
    @endif
</div>

@endsection
