<title>Register form</title> 
<style> 
body { 
    font-family: Arial, sans-serif; 
    background-color: #f4f4f4; 
    padding: 20px; 
    margin: 0; 
} 
 
.container { 
    background-color: #fff; 
    padding: 20px 30px; 
    border-radius: 8px; 
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
    width: 400px; 
    margin: 0 auto; 
    margin-top: 20px; 
} 
 
h2 { 
    text-align: center; 
    margin-bottom: 20px; 
} 
 
.form-group { 
    margin-bottom: 15px; 
    width: 70%; 
    
} 
 
.form-group label { 
    display: block; 
    margin-bottom: 5px; 
    font-weight: bold; 
} 
 
.form-group input, .form-group select { 
    width: calc(100% - 20px); 
    padding: 8px 10px; 
    border: 1px solid #ccc; 
    border-radius: 4px; 
} 
 
.button-place { 
    text-align: center; 
} 
 
button { 
    padding: 10px 20px; 
    background-color: #007BFF; 
    border: none; 
    border-radius: 4px; 
    color: white; 
    font-size: 16px; 
    cursor: pointer; 
    margin-top: 15px; 
} 
 
.form-container { 
    width: 70%; 
    margin: 0 auto; 
} 
.form-check-inline { 
    display: inline-block; 
    margin-right: 10px; /* Adjust the spacing between radio buttons as needed */ 
} 
 
button:hover { 
    background-color: #0056b3; 
} 
</style> 
 
@section('content') 
    <div class="form-container"> 
        <div class="container"> 
            <h2>User Registration Form</h2> 
 
            <!-- Display success message --> 
            @if (session('success')) 
                <div class="alert alert-success">{{ session('success') }}</div> 
            @endif 
 
            <!-- Display error message --> 
            @if (session('error')) 
                <div class="alert alert-danger">{{ session('error') }}</div> 
            @endif 
 
            <!-- Display validation errors --> 
            @if ($errors->any()) 
                <div class="alert alert-danger"> 
                    <ul> 
                        @foreach ($errors->all() as $error) 
                            <li>{{ $error }}</li> 
                        @endforeach 
                    </ul> 
                </div> 
            @endif 
 
            <form id="registrationForm" method="POST" action="{{ route('userPost') }}"> 
                @csrf 
                @method('post') 
                <!-- Add input fields for staff registration details --> 
               
                <div class="form-group"> 
                    <label for="password">Password</label> 
                    <input type="password" id="password" name="password" required> 
                </div> 
                
                <div class="form-group"> 
                    <label for="password">Email</label> 
                    <input type="email" id="email" name="email" required> 
                </div> 
                <div class="form-group"> 
    <label>Role</label><br> 
    <div class="form-check form-check-inline"> 
        <input type="radio" id="mentor" name="role" value="mentor"> 
        <label for="mentor">Mentor</label> 
    </div> 
    <div class="form-check form-check-inline"> 
        <input type="radio" id="staff" name="role" value="staff"> 
        <label for="staff">Staff</label> 
    </div> 
</div> 
 
                <!-- Add more fields as needed --> 
 
                <div class="button-place"> 
                    <button type="submit">Register</button> 
                </div> 
            </form> 
        </div> 
    </div> 