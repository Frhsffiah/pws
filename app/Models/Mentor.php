<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'fullname', 'ic_no', 'gender', 'phone_no', 'address', 'email',
    ];

    public function userprofile()
    {
        return $this->belongsTo(UserProfile::class, 'user_id', 'UserID');
    }
}


