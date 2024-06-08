<?php

namespace Database\Seeders;

use App\Models\Expert;
use Illuminate\Database\Seeder;

class expertTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $expertData = [
            [
                'eName' => 'Nur Auni Liyana Binti Mohd Khairi',
                'eInstitution' => 'Universiti Malaysia Pahang',
                'eEmail' => 'auniliyana@gmail.com',
                'ePhone' => '0123456789',
            ],
        ];
            
        foreach($expertData as $key => $val){
            Expert::create($val);
         }
    }
}

?>