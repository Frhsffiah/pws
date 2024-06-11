@extends('components.mentorLayout')

@section('mentor')

<div class="container">
    <h2>Expert Details</h2>

    <div class="expert-details">
        <div class="details-box">
            <div class="title-container">
                <h3>{{ $expert->eName }}</h3>
                
            </div>
            <p>Institution: {{ $expert->eInstitution }}</p>
            <p>Email: {{ $expert->eEmail }}</p>
            <p>Phone: {{ $expert->ePhone }}</p>
        </div>
        
        <div class="abstract-box">
            <h3>Researches & Paper</h3>
            @foreach ($expert->researches as $research)
                <div class="details-box">
                    <div class="title-container">
                        <h3>{{ $research->eResearchTitle }}</h3>
                        <div class="side-box">{{ $research->eDomain }}</div>
                    </div>

                    
                    @foreach ($research->papers as $paper)
                        <div class="details-box">
                            <div class="title-container">
                                <h3>{{ $paper->ePaperTitle }}</h3>
                                <div class="side-box">{{ $paper->ePublicationType }}</div>
                            </div>
                            <p>Year: {{ $paper->eYear }}</p>
                            @if ($paper->ePaperFile)
                                <a href="{{ asset('storage/' . $paper->ePaperFile) }}" class="download-btn" target="_blank">View Paper</a>
                            @else
                                <p>No file uploaded</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    .container {
        margin: 20px;
        position: relative;
    }

    .expert-details {
        display: flex;
        flex-direction: column;
    }

    .back-btn {
        padding: 8px 15px;
        background-color: var(--pink-color);
        color: white;
        border-radius: 5px;
        text-decoration: none;
        margin-left: 1300px;
        margin-bottom: 20px;
    }

    .back-btn:hover {
        background-color: #575757;
    }

    .details-box, .abstract-box {
        flex: 1;
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 20px;
        margin-top: 20px;
        max-width: 1400px; /* Adjust the maximum width */
        width: 100%; /* Ensure it is responsive */
        box-sizing: border-box; /* Ensure padding is included in width */
    }

    .details-box {
        flex: 1;
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 20px;
        margin-top: 20px;
    
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
