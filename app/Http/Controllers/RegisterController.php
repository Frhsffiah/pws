<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;

class RegisterController extends Controller
{


    public function list(){ //list of registration
        $registers = Registration::all();
        return view('registration.Mentor.view_register_page', compact('registers'));
    }

    public function registerPage()  //interface make new registration
    {
        return view('registration.Staff.register_page'); // This should match the Blade template name
    }

    public function store(Request $request)  //store data to database
{
    $validatedData = $request->validate([
        'RegID' => 'required|string|max:255|unique:registrations,RegID',
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
        // 'Staff_ID' => 'required|exists:staff,id',
        // 'Platinum_ID' => 'required|exists:platinums,id',
    ]);

    // Store the validated data in the database
    $registration = Registration::create($validatedData);

    return redirect()->route('registers.show', $registration->RegID);
}

    public function show($RegID) //specific view of selected RegID
{
    $registers = Registration::findOrFail($RegID);
    return view('registration.Staff.view_register_page', compact('registers'));
}
}
