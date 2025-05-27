<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Objective;
use Illuminate\Support\Facades\App;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Learn extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\LearnFactory> */
    use HasFactory,InteractsWithMedia;
    protected $guarded =['id'];
//  protected $casts = [
//  'name' => 'array',
//  'description' => 'array',
//  'type' => 'array',
//  ];
public function objective()
{
    return $this->hasMany(Objective::class);
}

    public function registerMediaCollections():void
    {
    $this->addMediaCollection('learns')
    ->useDisk('media');

    }
    public function name():Attribute{
        return Attribute::make(
            get: function ($value) {
                $decoded = json_decode($value, true);
                $locale = App::getLocale();
                return $decoded[$locale] ?? null;
            },
            set: fn ($value) => is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE) : $value
        );
    }
    public function description():Attribute{
        return Attribute::make(
            get: function ($value) {
                $decoded = json_decode($value, true);
                $locale = App::getLocale();
                return $decoded[$locale] ?? null;
            },
            set: fn ($value) => is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE) : $value
        );
    }
    public function type():Attribute{
        return Attribute::make(
            get: function ($value) {
                $decoded = json_decode($value, true);
                $locale = App::getLocale();
                return $decoded[$locale] ?? null;
            },
            set: fn ($value) => is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE) : $value
        );
    }
}
