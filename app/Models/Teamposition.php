<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;

class Teamposition extends Model
{
    /** @use HasFactory<\Database\Factories\TeampositionFactory> */
    use HasFactory;
    protected $guarded =['id'];
    protected $casts = [
        'name' => 'array',
        'description'=>'array'
    ];
    public function teams(){
        return $this->hasMany(Team::class);
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