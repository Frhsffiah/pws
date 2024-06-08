@extends('components.platinumLayout')

@section('platinum')
<div class="container">
    <h2>View Publication</h2>
    <div class="publication-details">
        <div class="details-box">
            <h3>{{ $publication->Pub_Title }}</h3>
            <div class="side-box">{{ $publication->Pub_type }}</div>
            <p>{{ $publication->Pub_date }}</p>
            <p>DOI: {{ $publication->Pub_DOI }}</p>
            <p>Author: {{ $publication->Pub_author }}</p>
            <a href="#" class="download-btn">Download</a>
        </div>
        <div class="abstract-box">
            <h3>Abstract</h3>
            <p>{{ $publication->Pub_File }}</p>
        </div>
    </div>
</div>

<style>
    .container {
        margin: 20px;
        position: relative;
    }

    .publication-details {
        display: flex;
        justify-content: space-between;
    }

    .details-box {
        flex: 1;
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 20px;
        margin-right: 20px;
    }

    .side-box {
        border-radius: 5px;
        padding: 5px;
        color: white;
        text-align: center;
        margin-bottom: 10px;
    }

    .download-btn {
        display: inline-block;
        padding: 8px 15px;
        background-color: red;
        color: white;
        border-radius: 5px;
        text-decoration: none;
    }

    .download-btn:hover {
        background-color: darkred;
    }

    .abstract-box {
        flex: 1;
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 20px;
    }

    .side-box{ background-color: blue; }
</style>
@endsection
