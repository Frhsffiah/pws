@extends('components.platinumLayout')

@section('platinum')

<div class="container">
    <h2 class="header-title">Edit Expert</h2>

    <div class="form-container">
        <form method="POST" action="{{ route('experts.update', $expert->expertID) }}" enctype="multipart/form-data" class="centered-form">
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

                <!-- Expert Details -->
                <label for="eName">Name:</label>
                <input type="text" id="eName" name="eName" value="{{ $expert->eName }}" class="form-control" placeholder="Name">

                <label for="eInstitution">Institution:</label>
                <input type="text" id="eInstitution" name="eInstitution" value="{{ $expert->eInstitution }}" class="form-control" placeholder="Institution">

                <label for="eEmail">Email:</label>
                <input type="text" id="eEmail" name="eEmail" value="{{ $expert->eEmail }}" class="form-control" placeholder="Email">

                <label for="ePhone">Phone Number:</label>
                <input type="text" id="ePhone" name="ePhone" value="{{ $expert->ePhone }}" class="form-control" placeholder="Phone Number">

                <!-- Research Details -->
                <h3 class="header-title">Research Details</h3>
                <div id="research-section">
                    @foreach($expert->researches as $research)
                        <div class="research-item">
                            <input type="hidden" name="researchID[]" value="{{ $research->eResearchID }}">
                            <label for="researchTitle">Research Title:</label>
                            <input type="text" name="researchTitle[]" value="{{ $research->eResearchTitle }}" class="form-control" placeholder="Research Title">

                            <label for="researchDomain">Domain:</label>
                            <input type="text" name="researchDomain[]" value="{{ $research->eDomain }}" class="form-control" placeholder="Domain">
                        </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-secondary add-research">Add More Research</button>

                <!-- Paper Details -->
                <h3 class="header-title">Paper Details</h3>
                <div id="paper-section">
                    @foreach($expert->papers as $paper)
                        <div class="paper-item">
                            <input type="hidden" name="paperID[]" value="{{ $paper->ePaperID }}">
                            <label for="paperTitle">Paper Title:</label>
                            <input type="text" name="paperTitle[]" value="{{ $paper->ePaperTitle }}" class="form-control" placeholder="Paper Title">

                            <label for="paperYear">Year:</label>
                            <input type="number" name="paperYear[]" value="{{ $paper->eYear }}" class="form-control" placeholder="Year">

                            <label for="paperType">Publication Type:</label>
                            <input type="text" name="paperType[]" value="{{ $paper->ePublicationType }}" class="form-control" placeholder="Publication Type">

                            <label for="ePaperFile">Choose file</label>
                            <input type="file" class="form-control" name="ePaperFile[]" value="{{ $paper->ePaperFile }}">
                        </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-secondary add-paper">Add More Paper</button>
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

    input[type="text"], input[type="number"], select, input[type="file"], input[type="date"] {
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

<script>
    document.querySelector('.add-research').addEventListener('click', function() {
        let researchHtml = `
            <div class="research-item">
                <label for="researchTitle">Research Title:</label>
                <input type="text" name="researchTitle[]" class="form-control" placeholder="Research Title">
                <label for="researchDomain">Domain:</label>
                <input type="text" name="researchDomain[]" class="form-control" placeholder="Domain">
            </div>
        `;
        document.querySelector('#research-section').insertAdjacentHTML('beforeend', researchHtml);
    });

    document.querySelector('.add-paper').addEventListener('click', function() {
        let paperHtml = `
            <div class="paper-item">
                <label for="paperTitle">Paper Title:</label>
                <input type="text" name="paperTitle[]" class="form-control" placeholder="Paper Title">
                <label for="paperYear">Year:</label>
                <input type="number" name="paperYear[]" class="form-control" placeholder="Year">
                <label for="paperType">Publication Type:</label>
                <input type="text" name="paperType[]" class="form-control" placeholder="Publication Type">
                <label for="ePaperFile">Choose file</label>
                <input type="file" class="form-control" name="ePaperFile[]">
            </div>
        `;
        document.querySelector('#paper-section').insertAdjacentHTML('beforeend', paperHtml);
    });
</script>

@endsection
