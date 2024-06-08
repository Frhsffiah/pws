@extends('components.platinumLayout')

@section('platinum')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Expert - Expert Paper</h2>
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

<form action="{{ route('experts.post.create.step3') }}" method="POST">
    @csrf

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

    <button type="button" class="btn btn-secondary add-paper">Add More Paper</button>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

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

