<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $table = 'registrations';
    protected $primaryKey = 'RegID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'R_Type', 'R_Title', 'R_FullName', 'R_IC', 'R_Gender', 
        'R_Religion', 'R_Race', 'R_Citizenship', 'R_Address', 'R_PhoneNum', 
        'R_Email', 'R_FbName', 'R_CurrentEduLvl', 'R_EduField', 'R_EduInstitute', 
        'R_Occupation', 'R_Sponsorship', 'R_Program', 'R_Batch', 'Staff_ID', 
         'password'
    ];
}
