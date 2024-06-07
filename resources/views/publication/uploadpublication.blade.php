@extends('components.platinumLayout')

@section('platinum')

@if ($errors->any())
<div class="pt-3">
    <div class="error-popup">
        <button class="close-btn" onclick="closeErrorPopup()">X</button>
        <ul>
            @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif

<div class="container">
    <h2 class="header-title">Upload Publications</h2>

    <div class="form-container">
        <form method="POST" action="{{ route('Publication.store') }}" enctype="multipart/form-data" class="centered-form">
            @csrf
            <div class="rounded-form">
                <h3>Publication Details</h3>
                <label for="Pub_type">Publication Type:</label>
                <select id="Pub_type" name="Pub_type">
                    <option value="">Select Publication Type</option>
                    <option value="article">Article</option>
                    <option value="journal">Journal</option>
                    <option value="thesis">Thesis</option>
                    <option value="report">Report</option>
                </select>
                <label for="file">File:</label>
                <input type="file" id="file" name="Pub_File">
                <label for="title">Title:</label>
                <input type="text" id="title" name="Pub_Title">
                <h3>Author Details</h3>
                <label for="author">Author:</label>
                <input type="text" id="author" name="Pub_author">
                <label for="year">Year Publication:</label>
                <input type="date" id="year" name="Pub_date">
                <label for="doi">DOI:</label>
                <input type="text" id="doi" name="Pub_DOI">
            </div>
            <button type="submit" class="upload-btn">Upload</button>
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
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .upload-btn:hover {
        background-color: #45a049;
    }

    .error-popup {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #dc3545;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        z-index: 9999;
    }

    .close-btn {
        background: none;
        border: none;
        color: white;
        font-size: 20px;
        cursor: pointer;
        margin-left: auto;
        display: block;
    }

    .close-btn:focus {
        outline: none;
    }
</style>

<script>
    function closeErrorPopup() {
        document.querySelector('.error-popup').style.display = 'none';
    }
</script>

@endsection
