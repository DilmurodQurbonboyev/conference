<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SendEmail;

class Register extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullName',
        'organization',
        'last_name',
        'first_name',
        'middle_name',
        'position',
        'country',
        'email',
        'photo',
        'status',
        'browser_agent',
        'user_ip',
        'gender',
        'participation_format',
        'breakout_session'
    ];

    public function sendEmail()
    {
        return $this->hasMany(SendEmail::class);
    }
}
