@extends('components.mentorLayout')

@section('mentor')
<div class="container">
    <h2>View Publication</h2>
    <div class="publication-details">
        <div class="details-box">
        <div class="title-container">
                <h3>{{ $publication->Pub_Title }}</h3>
                <div class="side-box">{{ $publication->Pub_type }}</div>
            </div>
            <p>{{ $publication->Pub_date }}</p>
            <p>DOI: {{ $publication->Pub_DOI }}</p>
            <p>Author: {{ $publication->Pub_author }}</p>
            @if($publication->Pub_File)
                <a href="{{ Storage::url($publication->Pub_File) }}" class="download-btn" target="_blank">Download</a>
            @endif
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
        flex-direction: column;
        
    }

    .details-box {
        flex: 1;
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
    }

    .details-box p {
        margin: 10px 0;
        line-height: 1.5;
    }

    .title-container {
        display: flex;
        align-items: center;
    }

    .side-box {
        border-radius: 5px;
        padding: 5px;
        color: white;
        text-align: center;
        margin-left: 10px;
        background-color: blue;
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
        margin-top: 20px;
    }
</style>
@endsection
