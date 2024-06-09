<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert_research extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'eResearchID';
    protected $fillable = ['eResearchTitle', 'eDomain', 'expertID'];

    public function expert()
    {
        return $this->belongsTo(Expert::class, 'expertID');
    }

    public function papers()
    {
        return $this->hasMany(Expert_paper::class, 'eResearchID');
    }
}
