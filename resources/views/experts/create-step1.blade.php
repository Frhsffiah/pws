@extends('components.platinumLayout')

@section('platinum')
<div class="container">
<h2 class="header-title">Add New Expert - Expert Detail</h2>
<div class="form-container">

<form action="{{ route('experts.post.create.step1') }}" method="POST" class="centered-form">
    @csrf
    <div class="rounded-form">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
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
    <div class="form-group">
        <strong>Name:</strong>
        <input type="text" name="eName" class="form-control" placeholder="Name" value="{{ session('expert.eName') }}">
    </div>
    <div class="form-group">
        <strong>Institution:</strong>
        <input type="text" name="eInstitution" class="form-control" placeholder="Institution" value="{{ session('expert.eInstitution') }}">
    </div>
    <div class="form-group">
        <strong>Email:</strong>
        <input type="text" name="eEmail" class="form-control" placeholder="Email" value="{{ session('expert.eEmail') }}">
    </div>
    <div class="form-group">
        <strong>Phone Number:</strong>
        <input type="text" name="ePhone" class="form-control" placeholder="Phone Number" value="{{ session('expert.ePhone') }}">
    </div>
    </div>
    <button type="submit" class="upload-btn">Next</button>
    </form>

</div>
</div>
 

<style>
    /* Add this CSS to your stylesheets */

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

input[type="text"],
select,
input[type="file"],
input[type="date"] {
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
