<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Report;
use App\Models\TeamPosition;
use App\Models\TeamReport;
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

    public function teamReport()
    {
    return $this->hasMany(TeamReport::class);
    }
    public function teamPosition()
    {
    return $this->belongsTo(TeamPosition::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function comppaigns()
    {
        return $this->hasMany(Compaign::class);
    }

}