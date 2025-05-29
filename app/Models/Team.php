<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Teamposition;
use App\Models\TeamReport;
use App\Models\Appointment;
use App\Models\Unit;
use Illuminate\Support\Facades\App;

class Team extends Model
{
    /** @use HasFactory<\Database\Factories\TeamFactory> */
    use HasFactory;
    protected $casts = [
    'name' => 'array',
    'level' => 'array',

    ];

    public function unit()
    {
    return $this->belongsTo(Unit::class);
    }

    protected $guarded =['id'];
    public function appointments()
    {
    return $this->hasMany( Appointment::class);
    }
    public function teamReport()
    {
    return $this->hasMany(TeamReport::class);
    }
    public function Teamposition(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
    return $this->belongsTo(TeamPosition::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function Compaign()
    {
        return $this->hasMany(Compaign::class);
    }
        public function shouldReturnRawJson(){
        if(!app()->runningInConsole() && $request = app(Request::class)){
        $action = $request->route()->getActionMethod();

        return $action ==='show';
        }
        return false;
        }



        public function name():Attribute{
        return Attribute::make(
        get: function ($value) {
        $decoded = json_decode($value, true);
        if($this->shouldReturnRawJson()){
        return $decoded;
        }
        $locale = App::getLocale();
        return $decoded[$locale] ?? null;
        },
        set: fn ($value) => is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE) : $value
        );
        }



    public function level():Attribute{
        return Attribute::make(
            get: function ($value) {
                $decoded = json_decode($value, true);
                 if($this->shouldReturnRawJson()){
                 return $decoded;
                 }
                $locale = App::getLocale();
                return $decoded[$locale] ?? null;
            },
            set: fn ($value) => is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE) : $value
        );
    }
}