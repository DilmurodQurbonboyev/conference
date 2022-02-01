<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullName',
        'organization',
        'position',
        'country',
        'email',
        'photo',
        'status',
        'browser_agent',
        'user_ip',
    ];
}
