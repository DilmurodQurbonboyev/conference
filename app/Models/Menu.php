<?php

namespace App\Models;

use App\Models\MenuTranslation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Menu extends Model implements TranslatableContract, Auditable
{
    use HasFactory, SoftDeletes, Translatable;

    use \OwenIt\Auditing\Auditable;

    public $useTranslationFallback = true;


    protected $table = 'menus';

    public $translatedAttributes = ['title'];

    protected $fillable = [
        'link',
        'link_type',
        'image',
        'parent_id',
        'menus_category_id',
        'status',
        'order',
        'user_id',
        'modifier_id',
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
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function submenus()
    {
        return $this->hasMany(Menu::class, 'parent_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(MenusCategory::class, 'menus_category_id');
    }

    public function menus_translation()
    {
        return $this->hasMany(MenuTranslation::class);
    }

    public static function buildTree(array $elements, $parentId = null)
    {
        $branch = array();

        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = self::buildTree($elements, $element['id']);
                if ($children) {
                    $element['submenus'] = $children;
                }
                $branch[] = $element;
            }
        }
        return $branch;
    }
}
