<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use App\Models\Compaign;
use App\Models\OrganizationCompaign;
use Illuminate\Support\Facades\App;

class Organization extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $casts = [
        'name' => 'array',
        'description' => 'array',
    ];

    public function compaigns()
    {
        return $this->hasMany(OrganizationCompaign::class);
    }
    public function compaignss()
    {
        return $this->belongsToMany(Compaign::class, "organization_compaigns");
    }
    public function shouldReturnRawJson()
    {
        if (!app()->runningInConsole() && $request = app(Request::class)) {
            $action = $request->route()->getActionMethod();

            return $action === 'show';
        }
        return false;
    }



    public function name(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                $decoded = json_decode($value, true);
                if ($this->shouldReturnRawJson()) {
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
                if ($this->shouldReturnRawJson()) {
                    return $decoded;
                }
                $locale = App::getLocale();
                return $decoded[$locale] ?? null;
            },
            set: fn($value) => is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE) : $value
        );
    }
}
