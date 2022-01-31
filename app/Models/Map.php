<?php

namespace App\Models;

use App\Models\User;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\MapTranslation;

class Map extends Model implements TranslatableContract, Auditable
{
    use HasFactory, SoftDeletes, Translatable;

    use \OwenIt\Auditing\Auditable;

    public $useTranslationFallback = true;

    protected $table = 'maps';

    public $translatedAttributes = ['title', 'address'];

    protected $fillable = ['latitude', 'longitude', 'status', 'user_id', 'modifier_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function modifier()
    {
        return $this->belongsTo(User::class);
    }

    public function map_translation()
    {
        return $this->hasMany(MapTranslation::class);
    }

}
