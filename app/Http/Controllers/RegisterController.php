<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){ //list of registration for staff
        $registers = Registration::all();
        return view('registration.Staff.list_register_page', compact('registers'));
    }


    public function list(){ //list of registration for mentor
        $registers = Registration::all();
        return view('registration.Mentor.view_register_page', compact('registers'));
    }
   
    public function create()  //interface make new registration
    {
        return view('registration.Staff.register_page'); // This should match the Blade template name
    }

    public function store(Request $request)  //store data to database
{
    $validatedData = $request->validate([
       // 'RegID' => 'required|string|max:255|unique:registrations,RegID',
        'R_Type' => 'required|in:new,renewal,upgrade,downgrade,ala_carte',
        'R_Title' => 'required|string|max:255',
        'R_FullName' => 'required|string|max:255',
        'R_IC' => 'required|string|max:20|unique:registrations,R_IC',
        'R_Gender' => 'required|in:female,male',
        'R_Religion' => 'required|in:islam,hindu,buddha,kristian',
        'R_Race' => 'required|in:melayu,cina,india',
        'R_Citizenship' => 'required|in:warganegara,bukan_warganegara',
        'R_Address' => 'required|string|max:500',
        'R_PhoneNum' => 'required|string|max:15',
        'R_Email' => 'required|email|max:255|unique:registrations,R_Email',
        'R_FbName' => 'required|string|max:255',
        'R_CurrentEduLvl' => 'required|string|max:255',
        'R_EduField' => 'required|string|max:255',
        'R_EduInstitute' => 'required|string|max:255',
        'R_Occupation' => 'required|string|max:255',
        'R_Sponsorship' => 'required|string|max:255',
        'R_Program' => 'required|string|max:255',
        'R_Batch' => 'required|string|max:255',
        'password' => 'required',
        // 'Staff_ID' => 'required|exists:staff,Staff_ID',
        // 'Platinum_ID' => 'required|exists:platinums,Platinum_ID',
        
    ]);

    $data = [
        //'RegID' => $request->RegID,
        'R_Type' => $request->R_Type,
        'R_Title' => $request->R_Title,
        'R_FullName' => $request->R_FullName,
        'R_IC' => $request->R_IC,
        'R_Gender' => $request->R_Gender,
        'R_Religion' => $request->R_Religion,
        'R_Race' => $request->R_Race,
        'R_Citizenship' => $request->R_Citizenship,
        'R_Address' => $request->R_Address,
        'R_PhoneNum' => $request->R_PhoneNum,
        'R_Email' => $request->R_Email,
        'R_FbName' => $request->R_FbName,
        'R_CurrentEduLvl' => $request->R_CurrentEduLvl,
        'R_EduField' => $request->R_EduField,
        'R_EduInstitute' => $request->R_EduInstitute,
        'R_Occupation' => $request->R_Occupation,
        'R_Sponsorship' => $request->R_Sponsorship,
        'R_Program' => $request->R_Program,
        'R_Batch' => $request->R_Batch,
        'password' => $request->password

    ];
    try {

    
    $registration = Registration::create($validatedData);
    session(['platinums' => $registration->R_FullName]);

    //redirect with success message
    return redirect()->route('registers.create')->with('success', 'Platinum registered successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to register platinum.', $e->getMessage());
    }
    $validatedData['password'] = Hash::make($request->password);

    // Store the validated data in the database
    $registration = Registration::create($validatedData);

    return redirect()->route('registers.index', $registration->RegID);
}

    public function show($RegID) //specific view of selected RegID
{
    $registers = Registration::findOrFail($RegID);
    return view('registration.Staff.view_register_page', compact('registers'));
}

public function show2($RegID) //specific view of selected RegID
{
    $registers = Registration::findOrFail($RegID);
    return view('registration.Mentor.view2_register_page', compact('registers'));
}
}
