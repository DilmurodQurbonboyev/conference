<?php

namespace App\Models;

use App\Models\Menu;
use App\Models\MenusCategoryTranslation;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class MenusCategory extends Model implements TranslatableContract, Auditable
{
    use HasFactory, SoftDeletes, Translatable;

    use \OwenIt\Auditing\Auditable;

    public $useTranslationFallback = true;

    protected $dates = ['deleted_at'];

    protected $table = 'menus_categories';

    public $translatedAttributes = ['title'];

    protected $fillable = [
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

    public function menus_category_translation()
    {
        return $this->hasMany(MenusCategoryTranslation::class);
    }

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    public function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%' . $search . '%')
                ->orWhereHas('menus_category_translation', function (Builder $query) use ($search) {
                    $query->where('title', 'like', '%' . $search . '%');
                });
    }
}
