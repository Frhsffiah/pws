@extends('components.platinumLayout')

@section('platinum')


<div class="container">
    <h2 class="header-title">Edit Publication</h2>

    <div class="form-container">
        <form method="POST" action="{{ route('Publication.update', $publication->PubID) }}" enctype="multipart/form-data" class="centered-form">
            @csrf
            <div class="rounded-form">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
                <label for="Pub_type">Publication Type:</label>
                <select id="Pub_type" name="Pub_type">
                    <option value="">Select Publication Type</option>
                    <option value="article" {{ $publication->Pub_type == 'article' ? 'selected' : '' }}>Article</option>
                    <option value="journal" {{ $publication->Pub_type == 'journal' ? 'selected' : '' }}>Journal</option>
                    <option value="thesis" {{ $publication->Pub_type == 'thesis' ? 'selected' : '' }}>Thesis</option>
                    <option value="report" {{ $publication->Pub_type == 'report' ? 'selected' : '' }}>Report</option>
                </select>
                <label for="Pub_File">File:</label>
                <input type="file" id="Pub_File" name="Pub_File">
                <label for="Pub_Title">Title:</label>
                <input type="text" id="Pub_Title" name="Pub_Title" value="{{ $publication->Pub_Title }}">
                <label for="Pub_author">Author:</label>
                <input type="text" id="Pub_author" name="Pub_author" value="{{ $publication->Pub_author }}">
                <label for="Pub_date">Year Publication:</label>
                <input type="date" id="Pub_date" name="Pub_date" value="{{ $publication->Pub_date }}">
                <label for="Pub_DOI">DOI:</label>
                <input type="text" id="Pub_DOI" name="Pub_DOI" value="{{ $publication->Pub_DOI }}">
            </div>
            <button type="submit" class="upload-btn">Save</button>
        </form>
    </div>
</div>

<style>
    .container {
        margin: 20px auto;
        max-width: 800px;
        position: relative;
    }

    .header-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: left;
    }

    .form-container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .centered-form {
        width: 100%;
    }

    .rounded-form {
        width: calc(80% - 10px);
        padding: 20px;
        background-color: #f9f9f9;
        border: 1px solid #ccc;
        border-radius: 20px;
        margin-bottom: 20px;
    }

    .rounded-form h3 {
        margin-bottom: 15px;
        font-size: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="text"], select, input[type="file"], input[type="date"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .upload-btn {
        background-color: var(--pink-color);
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .upload-btn:hover {
        background-color: #575757;
    }

    .alert {
        width: calc(80% - 10px);
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        text-align: left;
        border: 1px solid transparent;
    }

    .alert-success {
        background-color: #dff0d8;
        color: #3c763d;
        border-color: #d6e9c6;
    }

    .alert-danger {
        background-color: #f2dede;
        color: #a94442;
        border-color: #ebccd1;
    }
</style>
@endsection