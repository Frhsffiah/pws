@extends('components.platinumLayout')

@section('platinum')

<div class="container">
    <h2 class="header-title">Edit Expert</h2>

    <div class="form-container">
        <form method="POST" action="{{ route('experts.update', $expert->expertID) }}" class="centered-form">
            @csrf
            @method('PUT')
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

                <label for="eName">Name:</label>
                <input type="text" id="eName" name="eName" value="{{ $expert->eName }}" class="form-control" placeholder="Name">

                <label for="eInstitution">Institution:</label>
                <input type="text" id="eInstitution" name="eInstitution" value="{{ $expert->eInstitution }}" class="form-control" placeholder="Institution">

                <label for="eEmail">Email:</label>
                <input type="text" id="eEmail" name="eEmail" value="{{ $expert->eEmail }}" class="form-control" placeholder="Email">

                <label for="ePhone">Phone Number:</label>
                <input type="text" id="ePhone" name="ePhone" value="{{ $expert->ePhone }}" class="form-control" placeholder="Phone Number">
            </div>
            <button type="submit" class="upload-btn">Submit</button>
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

    label {
        display: block;
        margin-bottom: 10px;
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
