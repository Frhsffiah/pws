<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $primaryKey = 'PubID';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'publications';
    public $timestamps = false;

    protected $fillable = [
        'PubID', 
        'Pub_Title', 
        'Pub_author', 
        'Pub_date',
        'Pub_type', 
        'Pub_DOI', 
        'RegID', 
        'Mentor_ID', 
    ];
}
