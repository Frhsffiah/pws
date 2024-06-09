@extends('components.mentorLayout')

@section('mentor')
<div class="container">
    <h2>View Publication</h2>
    <a href="{{ route('Publication.searchMentor') }}" class="back-btn">Back</a>
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
            <p>Technical engineers have always been the primary developers of embedded software-intensive systems. Nowadays,
                the rise of connected devices and the need for highly trained personnel in technical domains has led to the
                growth of specific technical degree programs, combining technical engineering and software engineering.
                This raises challenges for software engineering education in these technical engineering disciplines. 
                Among others, different backgrounds, the need for very specialized software, and time constraints, limit 
                the usefulness of classical software engineering education approaches. This paper compares the state of 
                the art in software engineering education for traditional computer science and software engineering degree 
                programs with the needs of robotics software engineering education. From our experiences in teaching 
                software engineering to robotics students, we conclude that software engineering education for technical
                engineering degrees need to emphasize social aspects of software engineering, group work and weighing 
                advantages and disadvantages between different solution options.</p>
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

    .back-btn {
        padding: 8px 15px;
        background-color: var(--purple-color);
        color: white;
        border-radius: 5px;
        text-decoration: none;
        margin-left: 1200px;
        margin-bottom: 20px;
    }

    .back-btn:hover {
        background-color: #575757;
    }

    .details-box {
        flex: 1;
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 20px;
        margin-top: 30px;
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
