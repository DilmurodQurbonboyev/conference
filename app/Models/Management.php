<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Models\User;
use App\Models\MCategory;
use App\Models\ManagementTranslation;
use Illuminate\Database\Eloquent\SoftDeletes;



class Management extends Model implements TranslatableContract
{
    use HasFactory, Translatable, SoftDeletes;

    public $useTranslationFallback = true;

    public $translatedAttributes = [
        'title',
        'leader',
        'reception',
        'address',
        'biography',
        'description',
        'content',
    ];


    protected $fillable = [
        'list_type_id',
        'm_category_id',
        'slug',
        'image',
        'region_id',
        'anons_image',
        'phone',
        'email',
        'main',
        'fax',
        'order',
        'status',
        'user_id',
        'modifier_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function types()
    {
        return $this->belongsTo(ListType::class, 'lists_types');
    }

    public function category()
    {
        return $this->belongsTo(MCategory::class, 'm_category_id');
    }

    public function modifier()
    {
        return $this->belongsTo(User::class);
    }

    public function management_translation()
    {
        return $this->hasMany(ManagementTranslation::class);
    }
}
