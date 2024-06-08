<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Platinum Profile</title>
<style>
    /* CSS styles */
    .container {
        max-width: 800px;
        margin: auto;
        padding: 20px;
    }

    .profile-details {
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 10px;
        background-color: #f9f9f9;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        border-radius: 10px;
    }

    .close-btn {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close-btn:hover,
    .close-btn:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>
</head>
<body>
<div class="container">

        <h2>Platinum Profile</h2>
        <form id="editProfileForm" action="{{ route('platinum.profile' }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Form fields here, similar to the ones used for registration -->
            <div class="form-group">
                <label for="R_Title">Title</label>
                <input type="text" id="R_Title" name="R_Title" value="{{ $registration->R_Title }}" readonly>
            </div>
            <div class="form-group">
                <label for="R_FullName">Full Name</label>
                <input type="text" id="R_FullName" name="R_FullName" value="{{ $registration->R_FullName }}" readonly>
            </div>
            <div class="form-group">
                <label for="R_Address">Address</label>
                <input type="text" id="R_Address" name="R_Address" value="{{ $registration->R_Address }}" readonly>
            </div>
            <div class="form-group">
                <label for="R_PhoneNum">Phone Number</label>
                <input type="text" id="R_PhoneNum" name="R_PhoneNum" value="{{ $registration->R_PhoneNum }}" readonly>
            </div>
            <div class="form-group">
                <label for="R_Email">Email</label>
                <input type="email" id="R_Email" name="R_Email" value="{{ $registration->R_Email }}" readonly>
            </div>
            <div class="form-group">
                <label for="R_FbName">Facebook Name</label>
                <input type="text" id="R_FbName" name="R_FbName" value="{{ $registration->R_FbName }}" readonly>
            </div>
            <div class="form-group">
                <label for="R_EduInstitute">Education Institute</label>
                <input type="text" id="R_EduInstitute" name="R_EduInstitute" value="{{ $registration->R_EduInstitute }}" readonly>
            </div>
         
            
           
            <button type="submit" class="btn btn-blue">Save Changes</button>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const editProfileBtn = document.getElementById('editProfileBtn');
    const editProfileModal = document.getElementById('editProfileModal');
    const closeBtn = document.querySelector('.close-btn');

    editProfileBtn.addEventListener('click', function() {
        editProfileModal.style.display = 'block';
    });

    closeBtn.addEventListener('click', function() {
        editProfileModal.style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target === editProfileModal) {
            editProfileModal.style.display = 'none';
        }
    });
});
</script>
</body>
</html>
