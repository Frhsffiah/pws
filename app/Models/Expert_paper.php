<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert_paper extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'ePaperTitle', 'eYear', 'ePublicationType', 'expertID', 'eResearchID'
    ];

    public function expert()
    {
        return $this->belongsTo(Expert::class, 'expertID');
    }

    public function research()
    {
        return $this->belongsTo(Expert_research::class, 'eResearchID');
    }

}
