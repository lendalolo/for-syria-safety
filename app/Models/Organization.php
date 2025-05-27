<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Compaign;
use App\Models\OrganizationCompaign;
use Illuminate\Support\Facades\App;

class Organization extends Model
{
    use HasFactory;
    protected $guarded =['id'];
//    protected $casts = [
//    'name' => 'array',
//    'description' => 'array',
//    ];
    public function compaigns()
    {
        return $this->hasMany(OrganizationCompaign::class);
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
}
