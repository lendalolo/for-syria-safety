<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use App\Models\Team;
use Illuminate\Support\Facades\App;

class Unit extends Model
{
    use HasFactory;
     protected $casts = [
     'name' => 'array',
     'description' => 'array',
     ];
    protected $guarded =['id'];
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
