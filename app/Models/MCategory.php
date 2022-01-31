<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Models\ListType;
use App\Models\User;
use App\Models\MCategoryTranslation;
use App\Models\Management;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;


class MCategory extends Model implements TranslatableContract, Auditable
{
    use HasFactory, Translatable, SoftDeletes;

    use \OwenIt\Auditing\Auditable;

    public $useTranslationFallback = true;
    public $translatedAttributes = ['title'];

    protected $fillable = [
        'list_type_id',
        'parent_id',
        'slug',
        'image',
        'status',
        'user_id',
        'modifier_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function modifier()
    {
        return $this->belongsTo(User::class);
    }

    public function parent()
    {
        return $this->belongsTo(MCategory::class, 'parent_id');
    }

    public function managements()
    {
        return $this->hasMany(Management::class);
    }

    public function m_category_translation()
    {
        return $this->hasMany(MCategoryTranslation::class);
    }
}
