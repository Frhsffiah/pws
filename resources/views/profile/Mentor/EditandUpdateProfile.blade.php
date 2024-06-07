<!-- resources/views/editMentorProfilePage.blade.php -->


<div class="container">
    <h1>Edit Mentor Profile</h1>
    <form action="{{ route('updateMentorProfile') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="fullname">Full Name</label>
            <input type="text" class="form-control" id="fullname" name="fullname" value="{{ $mentor->fullname }}" required>
        </div>
        <div class="form-group">
            <label for="ic_no">IC No</label>
            <input type="text" class="form-control" id="ic_no" name="ic_no" value="{{ $mentor->ic_no }}" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <input type="text" class="form-control" id="gender" name="gender" value="{{ $mentor->gender }}" required>
        </div>
        <div class="form-group">
            <label for="no_phone">Phone Number</label>
            <input type="text" class="form-control" id="no_phone" name="no_phone" value="{{ $mentor->no_phone }}" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $mentor->address }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $mentor->email }}" required>
        </div>
        <button type="submit" class="btn btn-primary">UPDATE</button>
    </form>
</div>


@section('styles')
<style>
    .form-group {
        margin-bottom: 15px;
    }
    .btn-primary {
        background-color: #007bff;
        border: none;
        padding: 10px 20px;
        color: white;
        text-decoration: none;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>
@endsection
