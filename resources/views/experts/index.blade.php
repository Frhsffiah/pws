
@extends('components.platinumLayout')

@section('platinum')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>My Expert List</h2>
        </div>
        <br>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('experts.create.step1') }}"> Add New Expert</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<br>
<!-- SEARCH FORM -->
<div class="row mb-3">
    <div class="col-md-6">
        <form action="{{ route('experts.index') }}" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search Experts">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--END SEARCH FORM -->
<br>


<!--LIST APA YANG NAK DISPLAY IKUT TABLE -->
<table class="table table-bordered mt-3" >
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Institution</th>
        <th>Email</th>
        <th>Phone</th>
        <th width="280px">Action</th>
    </tr>
    
    <!--BETULKAN DETAIL DATA -->
    @php $i = 0 @endphp <!-- Initialize $i outside of the loop -->
    @foreach ($experts as $expert)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $expert->eName }}</td>
            <td>{{ $expert->eInstitution }}</td>
            <td>{{ $expert->eEmail }}</td>
            <td>{{ $expert->ePhone }}</td>
            <td>
                <form action="{{ route('experts.destroy',$expert->expertID) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('experts.show',$expert->expertID) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('experts.edit',$expert->expertID) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>


{!! $experts->links() !!}
@endsection
