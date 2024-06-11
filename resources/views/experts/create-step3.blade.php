@extends('components.platinumLayout')

@section('platinum')
<div class="container">
<h2 class="header-title">Add New Expert - Expert Paper</h2>
    <div class="form-container">
 

<form action="{{ route('experts.post.create.step3') }}" method="POST" enctype="multipart/form-data" class="centered-form">
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
        <strong>Paper Title:</strong>
        <input type="text" name="paperTitle[]" class="form-control" placeholder="Paper Title">
    </div>
    <div class="form-group">
        <strong>Year:</strong>
        <input type="number" name="paperYear[]" class="form-control" placeholder="Year">
    </div>
    <div class="form-group">
        <strong>Publication Type:</strong>
        <input type="text" name="paperType[]" class="form-control" placeholder="Publication Type">
    </div>
    <div class="form-group">
        <label for="file">Choose file</label>
        <input type="file" class="form-control"  name="ePaperFile[]" accept=".pdf,.doc,.docx">
    </div>
</div>
    <button type="button" class="btn btn-secondary add-paper">Add More Paper</button>
    <button type="submit" class="upload-btn">Submit</button>
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
input[type="number"],
input[type="date"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
.btn-secondary  {
    background-color: var(--pink-color);
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
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
<script>
    document.querySelector('.add-paper').addEventListener('click', function() {
        let paperHtml = `
            <div class="form-group">
                <strong>Paper Title:</strong>
                <input type="text" name="paperTitle[]" class="form-control" placeholder="Paper Title">
            </div>
            <div class="form-group">
                <strong>Year:</strong>
                <input type="number" name="paperYear[]" class="form-control" placeholder="Year">
            </div>
            <div class="form-group">
                <strong>Publication Type:</strong>
                <input type="text" name="paperType[]" class="form-control" placeholder="Publication Type">
            </div>
        `;
        document.querySelector('form').insertAdjacentHTML('beforeend', paperHtml);
    });
</script>
@endsection

