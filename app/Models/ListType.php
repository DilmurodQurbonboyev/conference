<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Models\User;

class ListType extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $fillable = [
        'user_id',
        'modifier_id'
    ];

    public $translatedAttributes = ['title'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function modifier()
    {
        return $this->belongsTo(User::class);
    }
}
