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

                'R_Type' => 'Renewal',
                'R_Title' => 'Cyber',
                'R_FullName'=> 'Afiqah binti Majid',
                'R_IC' => '020507154781',
                'R_Gender' => 'Female',
                'R_Religion'=> 'Islam',
                'R_Race' => 'Melayu',
                'R_Citizenship' => 'Warganegara',
                'R_Address' => 'NO 33 JALAN SRI RAYA 15',
                'R_PhoneNum' => '0173413545',
                'R_Email' => 'afiqah@gmail.com',
                'R_FbName' => 'afiqahh',
                'R_CurrentEduLvl' => 'degree',
                'R_EduField' => 'SCIENCE COMPUTER',
                'R_EduInstitute' => 'UNIVERSITI MALAYSIA TERENGGANU',
                'R_Occupation' => 'STUDENT',
                'R_Sponsorship' => 'MARA',
                'R_Program' => 'MARA',
                'R_Batch' => '2',
                'password' => bcrypt ('12345678'),

                'R_Type' => 'Upgrade (Premier)',
                'R_Title' => 'Networking',
                'R_FullName'=> 'Sarah Suhairi binti Ahmad',
                'R_IC' => '010201106584',
                'R_Gender' => 'Female',
                'R_Religion'=> 'Islam',
                'R_Race' => 'Melayu',
                'R_Citizenship' => 'Warganegara',
                'R_Address' => 'NO 33 JALAN SRI TANJUNG 15',
                'R_PhoneNum' => '0178452145',
                'R_Email' => 'sarah@gmail.com',
                'R_FbName' => 'sarahsuhairi',
                'R_CurrentEduLvl' => 'degree',
                'R_EduField' => 'SCIENCE COMPUTER',
                'R_EduInstitute' => 'UNIVERSITI MALAYSIA TERENGGANU',
                'R_Occupation' => 'STUDENT',
                'R_Sponsorship' => 'MARA',
                'R_Program' => 'MARA',
                'R_Batch' => '1',
                'password' => bcrypt ('12345678'),

                'R_Type' => 'Renewal',
                'R_Title' => 'Graphical',
                'R_FullName'=> 'Azam Hanif bin Asri',
                'R_IC' => '020501149545',
                'R_Gender' => 'Male',
                'R_Religion'=> 'Islam',
                'R_Race' => 'Melayu',
                'R_Citizenship' => 'Warganegara',
                'R_Address' => 'NO 33 JALAN SRI MEWAH 15',
                'R_PhoneNum' => '0112154851',
                'R_Email' => 'azam@gmail.com',
                'R_FbName' => 'azam',
                'R_CurrentEduLvl' => 'degree',
                'R_EduField' => 'SCIENCE COMPUTER',
                'R_EduInstitute' => 'UNIVERSITI MALAYSIA KELANTAN',
                'R_Occupation' => 'STUDENT',
                'R_Sponsorship' => 'MARA',
                'R_Program' => 'MARA',
                'R_Batch' => '2',
                'password' => bcrypt ('12345678'),

                'R_Type' => 'New',
                'R_Title' => 'Software',
                'R_FullName'=> 'Chong Manzie',
                'R_IC' => '020115065544',
                'R_Gender' => 'Female',
                'R_Religion'=> 'Buddha',
                'R_Race' => 'Cina',
                'R_Citizenship' => 'Warganegara',
                'R_Address' => 'NO 33 JALAN SRI DAHLIA 15',
                'R_PhoneNum' => '0158415211',
                'R_Email' => 'chong@gmail.com',
                'R_FbName' => 'ChongMazie',
                'R_CurrentEduLvl' => 'degree',
                'R_EduField' => 'SCIENCE COMPUTER',
                'R_EduInstitute' => 'UNIVERSITI MALAYSIA PAHANG',
                'R_Occupation' => 'STUDENT',
                'R_Sponsorship' => 'MARA',
                'R_Program' => 'MARA',
                'R_Batch' => '2',
                'password' => bcrypt ('12345678'),
            ],
        ];
            
        foreach($registers as $key => $val){
            Registration::create($val);
         }
    }
}

?>