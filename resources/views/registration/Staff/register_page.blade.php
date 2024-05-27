<!DOCTYPE html>
<html>
<head>
    <title>Register Page</title>
    <link href="{{asset('Module_1/register.css')}}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Registration</h1>
        <form id="registerForm" action="{{ route('Register.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="RegID">RegID</label>
                <input type="text" id="RegID" name="RegID" required>
            </div>
            
            <div class="form-group">
                <label for="R_Type">R_Type</label>
                <select id="R_Type" name="R_Type" required>
                    <option value="new">New</option>
                    <option value="renewal">Renewal</option>
                    <option value="upgrade">Upgrade (Premier)</option>
                    <option value="downgrade">Downgrade (Elite)</option>
                    <option value="ala_carte">Ala Carte</option>
                </select>
            </div>

            <div class="form-group">
                <label for="R_Title">R_Title</label>
                <input type="text" id="R_Title" name="R_Title" required>
            </div>

            <div class="form-group">
                <label for="R_FullName">R_FullName</label>
                <input type="text" id="R_FullName" name="R_FullName" required>
            </div>

            <div class="form-group">
                <label for="R_IC">R_IC</label>
                <input type="text" id="R_IC" name="R_IC" required>
            </div>

            <div class="form-group">
                <label for="R_Gender">R_Gender</label>
                <select id="R_Gender" name="R_Gender" required>
                    <option value="female">Female</option>
                    <option value="male">Male</option>
                </select>
            </div>

            <div class="form-group">
                <label for="R_Religion">R_Religion</label>
                <select id="R_Religion" name="R_Religion" required>
                    <option value="islam">Islam</option>
                    <option value="hindu">Hindu</option>
                    <option value="buddha">Buddha</option>
                    <option value="kristian">Kristian</option>
                </select>
            </div>

            <div class="form-group">
                <label for="R_Race">R_Race</label>
                <select id="R_Race" name="R_Race" required>
                    <option value="melayu">Melayu</option>
                    <option value="cina">Cina</option>
                    <option value="india">India</option>
                </select>
            </div>

            <div class="form-group">
                <label for="R_Citizenship">R_Citizenship</label>
                <select id="R_Citizenship" name="R_Citizenship" required>
                    <option value="warganegara">Warganegara</option>
                    <option value="bukan_warganegara">Bukan Warganegara</option>
                </select>
            </div>

            <div class="form-group">
                <label for="R_Address">R_Address</label>
                <input type="text" id="R_Address" name="R_Address" required>
            </div>

            <div class="form-group">
                <label for="R_PhoneNum">R_PhoneNum</label>
                <input type="text" id="R_PhoneNum" name="R_PhoneNum" required>
            </div>

            <div class="form-group">
                <label for="R_Email">R_Email</label>
                <input type="email" id="R_Email" name="R_Email" required>
            </div>

            <div class="form-group">
                <label for="R_FbName">R_FbName</label>
                <input type="text" id="R_FbName" name="R_FbName" required>
            </div>

            <div class="form-group">
                <label for="R_CurrentEduLvl">R_CurrentEduLvl</label>
                <input type="text" id="R_CurrentEduLvl" name="R_CurrentEduLvl" required>
            </div>

            <div class="form-group">
                <label for="R_EduField">R_EduField</label>
                <input type="text" id="R_EduField" name="R_EduField" required>
            </div>

            <div class="form-group">
                <label for="R_EduInstitute">R_EduInstitute</label>
                <input type="text" id="R_EduInstitute" name="R_EduInstitute" required>
            </div>

            <div class="form-group">
                <label for="R_Occupation">R_Occupation</label>
                <input type="text" id="R_Occupation" name="R_Occupation" required>
            </div>

            <div class="form-group">
                <label for="R_Sponsorship">R_Sponsorship</label>
                <input type="text" id="R_Sponsorship" name="R_Sponsorship" required>
            </div>

            <div class="form-group">
                <label for="R_Program">R_Program</label>
                <input type="text" id="R_Program" name="R_Program" required>
            </div>

            <div class="form-group">
                <label for="R_Batch">R_Batch</label>
                <input type="text" id="R_Batch" name="R_Batch" required>
            </div>

            <button type="submit" class="btn btn-blue" onclick="return confirm ('Are you sure you want to register?')">Register</button>
        </form>
    <!-- </div>
         <div id="popup" class="popup">
            <div class="popup-content">
            <span class="close-btn">&times;</span>
            <p>Registration success!</p>
         </div>
    </div> -->
    <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const registerForm = document.getElementById('registerForm');
            const popup = document.getElementById('popup');
            const closeBtn = document.querySelector('.close-btn');
            
            registerForm.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent form submission

                const formData = new FormData(registerForm);
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch(registerForm.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message === 'Registration successful') {
                        popup.style.display = 'flex';
                    } else {
                        alert('Registration failed: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });

            closeBtn.addEventListener('click', function() {
                popup.style.display = 'none';
            });
        });
    </script> -->
</body>
</html>
