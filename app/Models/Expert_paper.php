<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert_paper extends Model
{
    use HasFactory;
    protected $primaryKey = 'ePaperID';
    public $timestamps = false;
    protected $fillable = [
        'ePaperTitle', 'eYear', 'ePublicationType', 'expertID', 'eResearchID', 'ePaperFile'
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
