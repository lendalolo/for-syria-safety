<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Report;
use App\Models\Compaign;
class Location extends Model
{
    /** @use HasFactory<\Database\Factories\LocationFactory> */
    use HasFactory;
    protected $guarded =['id'];

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
    public function compaigns()
    {
        return $this->hasMany(Compaign::class);
    }
}