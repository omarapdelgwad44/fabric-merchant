<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    use HasTranslations;
    
    protected $guarded = [];
    
    public array $translatable = ['value'];

    public static function getValue(string $key, string $default = ''): string
    {
        return self::where('key', $key)->first()?->value ?? $default;
    }
}
