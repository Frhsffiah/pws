@extends('components.platinumLayout')

@section('platinum')

<div class="container">
    <h2 class="header-title">Delete Publications</h2>

    <div class="form-container">
        <div class="rounded-form">
            <form class="centered-form" action="{{ url('Publication/destroy') }}" method="POST">
                @if (session('success'))
                    <div class="alert alert-success">
                     {{ session('success') }}
                    </div>
                 @endif
                @csrf
                @method('DELETE')
                <label for="publication">Publication Title:</label>
                <select id="publication" name="publication_id" class="dropdown-input">
                    <option value="">Select Publication</option>
                    @foreach($publications as $publication)
                        <option value="{{ $publication->PubID }}">{{ $publication->Pub_Title }}</option>
                    @endforeach
                </select>
                <div class="button-container">
                <button type="submit" class="delete-btn">DELETE</button>
                </div>
            </form>
        </div>
    </div>
</div>
    

<style>
    .container {
        margin: 20px auto;
        max-width: 800px;
    }

    .header-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
        padding-right: 380px;
        
    }

    .form-container {
        display: flex;
        justify-content: center;
        align-items: center;
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
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    h3 {
        margin-bottom: 15px;
        font-size: 20px;
        text-align: center;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        padding-right: 450px;
    }

    .dropdown-input {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .button-container {
        display: flex;
        justify-content: center;
        width: 100%;
    }

    .delete-btn {
        width: auto;
        background-color: var(--pink-color);
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        
    }

    .delete-btn:hover {
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

</style>

@endsection
