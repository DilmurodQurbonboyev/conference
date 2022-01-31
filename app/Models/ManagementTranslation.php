<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagementTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'leader',
        'reception',
        'address',
        'biography',
        'description',
        'content',
    ];
}
