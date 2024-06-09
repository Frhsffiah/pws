@extends('components.platinumLayout')

@section('platinum')
<!--LIST APA YANG NAK DISPLAY IKUT TABLE -->
<h4>All Expert</h4>
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
    @foreach ($allExperts as $expert)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $expert->eName }}</td>
            <td>{{ $expert->eInstitution }}</td>
            <td>{{ $expert->eEmail }}</td>
            <td>{{ $expert->ePhone }}</td>
            <td>
                <form action="{{ route('experts.destroy',$expert->expertID) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('experts.show',$expert->expertID) }}">Show</a>

                </form>
            </td>
        </tr>
    @endforeach 
</table>


@endsection