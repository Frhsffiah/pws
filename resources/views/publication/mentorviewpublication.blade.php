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
            <div>
                <a href="{{ route('Publication.download', $publication->PubID) }}" class="btn-primary">Download File</a>
            </div>
            @endif
        </div>
        
        <div class="abstract-box">
            <h3>Abstract</h3>
            @if($publication->Pub_File)
            <div>
            @php
                $fileExtension = pathinfo($publication->Pub_File, PATHINFO_EXTENSION);
            @endphp
            @if(in_array($fileExtension, ['pdf', 'jpg', 'jpeg', 'png']))
                <iframe src="{{ route('Publication.showFile', $publication->PubID) }}" width="100%" height="600px"></iframe>
            @elseif(in_array($fileExtension, ['doc', 'docx']))
                <iframe src="https://docs.google.com/viewer?url={{ asset('storage/' . $publication->Pub_File) }}&embedded=true" width="100%" height="600px"></iframe>
            @else
                <p>Unsupported file type for inline display.</p>
            @endif
            </div>
    @endif
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
    .btn-primary {
        color:#fff;
        background-color: #0d6efd;
        border-color:#0d6efd;
    }

    .btn{
        display: inline-block;
        font-weight: 400;
        line-height:1.5;
        text-align: center;
        text-decoration: none;
        vertical-align: middle;
        cursor: pointer;
        user-select: none;
        border: 1px solid transparent;
        padding: .375rem .75rem;
        font-size: 1rem;
        border-radius: .25rem;
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
