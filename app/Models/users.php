<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class users extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'email', 'role', 'password', 'RegID'
    ];

    public function registration()
    {
        return $this->belongsTo(Registration::class, 'RegID', 'RegID');
    }
}
