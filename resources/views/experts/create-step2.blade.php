@extends('components.platinumLayout')

@section('platinum')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Expert - Expert Research & Domain</h2>
        </div>
    </div>
</div>

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

<form action="{{ route('experts.post.create.step2') }}" method="POST">
    @csrf

    <div class="form-group">
        <strong>Research Title:</strong>
        <input type="text" name="researchTitle[]" class="form-control" placeholder="Research Title">
    </div>
    <div class="form-group">
        <strong>Domain:</strong>
        <input type="text" name="researchDomain[]" class="form-control" placeholder="Domain">
    </div>

    <button type="button" class="btn btn-secondary add-research">Add More Research</button>
    <button type="submit" class="btn btn-primary">Next</button>
</form>

<script>
    document.querySelector('.add-research').addEventListener('click', function() {
        let researchHtml = `
            <div class="form-group">
                <strong>Research Title:</strong>
                <input type="text" name="researchTitle[]" class="form-control" placeholder="Research Title">
            </div>
            <div class="form-group">
                <strong>Domain:</strong>
                <input type="text" name="researchDomain[]" class="form-control" placeholder="Domain">
            </div>
        `;
        document.querySelector('form').insertAdjacentHTML('beforeend', researchHtml);
    });
</script>
@endsection
