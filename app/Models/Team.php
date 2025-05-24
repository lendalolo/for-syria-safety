<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Report;
use App\Models\Teamposition;
use App\Models\TeamReport;
use App\Models\Appointment;
use App\Models\Unit;

class Team extends Model
{
    /** @use HasFactory<\Database\Factories\TeamFactory> */
    use HasFactory;
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

}