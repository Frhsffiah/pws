@extends('components.platinumLayout')

@section('platinum')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Expert - Expert Detail</h2>
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

<form action="{{ route('experts.post.create.step1') }}" method="POST">
    @csrf
    
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

    <button type="submit" class="btn btn-primary">Next</button>
</form>
@endsection
