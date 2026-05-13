<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Fabric extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia;
    
    protected $guarded = [];
    
    public array $translatable = ['name', 'category'];
}
