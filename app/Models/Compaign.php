<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location;
use App\Models\ToolCompaign;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Step;
use App\Models\Organization;
use App\Models\Team;
use App\Models\OrganizationCompaign;
use Illuminate\Support\Facades\Route;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Compaign extends Model implements HasMedia
{

    /** @use HasFactory<\Database\Factories\CompaignFactory> */
    use HasFactory, InteractsWithMedia;
    protected $guarded = ['id'];
    protected $casts = [
        'name' => 'array',
        'description' => 'array',
        'article' => 'array',
    ];

    public function name(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                $decoded = json_decode($value, true);
                if (Route::currentRouteName() === 'compaigns.show') {
                    return $decoded;
                }
                $locale = App::getLocale();
                return $decoded[$locale] ?? null;
            },
            set: fn($value) => is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE) : $value
        );
    }
    public function description(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                $decoded = json_decode($value, true);
                if (Route::currentRouteName() === 'compaigns.show') {
                    return $decoded;
                }
                $locale = App::getLocale();
                return $decoded[$locale] ?? null;
            },
            set: fn($value) => is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE) : $value
        );
    }
    public function article(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                $decoded = json_decode($value, true);
                if (Route::currentRouteName() === 'compaigns.show') {
                    return $decoded;
                }
                $locale = App::getLocale();
                return $decoded[$locale] ?? null;
            },
            set: fn($value) => is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE) : $value
        );
    }
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('compaigns');
    }
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    //public function tools(){
    //return $this->belongsToMany(ToolCompaign::class);
    //}
    public function tools()
    {
        return $this->hasMany(ToolCompaign::class);
    }
    public function OrganizationCompaign()
    {
        return $this->hasMany(OrganizationCompaign::class);
    }
    // public function organization()
    // {
    //     return $this->belongsToMany(OrganizationCompaign::class);
    // }
    public function steps()
    {
        return $this->hasMany(Step::class);
    }
}
