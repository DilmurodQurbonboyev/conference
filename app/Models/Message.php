<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Models\MessageTranslation;
use OwenIt\Auditing\Contracts\Auditable;


class Message extends Model implements TranslatableContract, Auditable
{
    use HasFactory, Translatable;

    use \OwenIt\Auditing\Auditable;

    public $useTranslationFallback = true;

    public $translatedAttributes = ['title'];

    protected $fillable = ['key'];

    public function message_translation()
    {
        return $this->hasMany(MessageTranslation::class);
    }
}
