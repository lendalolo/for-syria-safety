<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Report;
use App\Models\TeamPosition;
use App\Models\TeamReport;

class Team extends Model
{
    /** @use HasFactory<\Database\Factories\TeamFactory> */
    use HasFactory;

    protected $guarded =['id'];

    public function reports()
    {
    return $this->hasMany(Report::class);
    }
    public function teamReport()
    {
    return $this->hasMany(TeamReport::class);
    }
    public function teamPosition()
    {
    return $this->belongsTo(TeamPosition::class);
    }


}