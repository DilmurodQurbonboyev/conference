<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\ListType;
use App\Models\User;
use App\Models\ListCategoryTranslation;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;


class ListCategory extends Model implements TranslatableContract, Auditable
{
    use HasFactory, SoftDeletes, Translatable, Sluggable;

    use \OwenIt\Auditing\Auditable;

    public $useTranslationFallback = true;
    public $translatedAttributes = ['title'];

    protected $fillable = [
        'list_type_id',
        'parent_id',
        'slug',
        'color',
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

    public function types()
    {
        return $this->belongsTo(ListType::class, 'list_types');
    }

    public function parent()
    {
        return $this->belongsTo(ListCategory::class, 'parent_id');
    }

    public function lists_category_translation()
    {
        return $this->hasMany(ListCategoryTranslation::class);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function makeSlug($slugable)
    {
        $slug = SlugService::createSlug(ListCategory::class, 'slug', $slugable, ['unique' => true]);

        return $slug;
    }
}
