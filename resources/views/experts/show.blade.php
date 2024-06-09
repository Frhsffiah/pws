@extends('components.platinumLayout')

@section('platinum')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Expert</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('experts.index') }}"> Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $expert->eName }}
                </div>
                <div class="form-group">
                    <strong>Institution:</strong>
                    {{ $expert->eInstitution }}
                </div>
                <div class="form-group">
                    <strong>Email:</strong>
                    {{ $expert->eEmail }}
                </div>
                <div class="form-group">
                    <strong>Phone Number:</strong>
                    {{ $expert->ePhone }}
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <strong>Domain:</strong>
                    <ul>
                        @foreach($expert->researches as $research)
                            <li>{{ $research->eDomain }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="form-group">
                    <strong>Research:</strong>
                    <ul>
                        @foreach($expert->researches as $research)
                            <li>{{ $research->eResearchTitle }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
