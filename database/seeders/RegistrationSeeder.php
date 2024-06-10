<?php

namespace Database\Seeders;

use App\Models\Registration;
use Illuminate\Database\Seeder;

class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $registers = [
            [
                'R_Type' => 'New',
                'R_Title' => 'Hacking',
                'R_FullName'=> 'Nurin Jaslina binti Mohd',
                'R_IC' => '020508101274',
                'R_Gender' => 'Female',
                'R_Religion'=> 'Islam',
                'R_Race' => 'Melayu',
                'R_Citizenship' => 'Warganegara',
                'R_Address' => 'NO 33 JALAN SRI MAWAR 15',
                'R_PhoneNum' => '0173413545',
                'R_Email' => 'jaslina@gmail.com',
                'R_FbName' => 'jass',
                'R_CurrentEduLvl' => 'degree',
                'R_EduField' => 'SCIENCE COMPUTER',
                'R_EduInstitute' => 'UNIVERSITI MALAYSIA PAHANG',
                'R_Occupation' => 'STUDENT',
                'R_Sponsorship' => 'MARA',
                'R_Program' => 'MARA',
                'R_Batch' => '1',
                'password' => bcrypt ('12345678'),
            ],
        ];
            
        foreach($registers as $key => $val){
            Registration::create($val);
         }
    }
}

?>