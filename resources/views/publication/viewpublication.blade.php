@extends('components.platinumLayout')

@section('platinum')
<div class="container">
    <h2>View Publication</h2>
    <a href="{{ route('Publication.showList') }}" class="back-btn">Back</a>
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
                <a href="{{ route('Publication.download', $publication->PubID) }}" class="btn btn-primary">Download File</a>
            </div>
            @endif
        </div>
        
        <div class="abstract-box">
            <h3>Abstract</h3>
            <p>Fundamentals of Networking is an immersive exploration of the interconnected networks that powers the modern world, 
                revealing its role as the digital world’s foundation. Explore the fundamental principles underpinning the vast network 
                infrastructure that empowers knowledge, fosters innovation, and connects individuals worldwide in this captivating 
                investigation.This comprehensive book gives you the skills to successfully negotiate the dynamic networking environment, 
                covering everything from network architecture fundamentals to data transfer complexities. Learn the inner workings 
                of IP addressing, subnetting and routing and the fundamentals of network protocols such as TCP/IP, DNS, DHCP. With 
                Fundamentals of Networking as your trusted companion, you’ll understand the inner workings of routers, switches and 
                firewalls and gain valuable insights into network security and troubleshooting.
                </p>
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
        background-color: var(--pink-color);
        color: white;
        border-radius: 5px;
        text-decoration: none;
        margin-left: 1060px;
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

    .abstract-box {
        flex: 1;
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 20px;
        margin-top: 20px;
    }

    .btn-primary {
    background-color: var(--pink-color);
    color: white;
    border-color: #0d6efd;
    
    }

    .btn {
    display: inline-block;
    font-weight: 400;
    line-height: 1.5;
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
</style>
@endsection
