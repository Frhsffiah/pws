<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $primaryKey = 'expertID';
    protected $fillable = [
        'eName','eInstitution','eEmail','ePhone','RegID'
    ];

    public function researches()
{
    return $this->hasMany(Expert_research::class, 'expertID', 'expertID');
}


    

}
?>
