<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Models\ListType;
use App\Models\ListCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\User;
use App\Models\ListsTranslation;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Lists extends Model implements TranslatableContract, Auditable
{
    use HasFactory, SoftDeletes, Translatable, Sluggable;

    use \OwenIt\Auditing\Auditable;

    public $useTranslationFallback = true;

    public $translatedAttributes = [
        'title',
        'description',
        'content',
        'pdf_title',
        'pdf',
    ];


    protected $fillable = [
        'list_type_id',
        'lists_category_id',
        'slug',
        'image',
        'anons_image',
        'body_image',
        'show_on_slider',
        'pdf_type',
        'video_code',
        'video',
        'media_type',
        'link',
        'link_type',
        'parent_id',
        'right_menu',
        'date',
        'order',
        'count_view',
        'status',
        'user_id',
        'modifier_id',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

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
        return $this->belongsTo(ListType::class, 'lists_types');
    }

    public function parent()
    {
        return $this->belongsTo(Lists::class, 'title');
    }

    public function category()
    {
        return $this->belongsTo(ListCategory::class, 'lists_category_id');
    }

    public function lists_translation()
    {
        return $this->hasMany(ListsTranslation::class);
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
        $slug = SlugService::createSlug(Lists::class, 'slug', $slugable, ['unique' => true]);

        return $slug;
    }
}
