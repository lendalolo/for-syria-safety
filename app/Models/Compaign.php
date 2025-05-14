<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location;
use App\Models\Team;
class Compaign extends Model
{
    /** @use HasFactory<\Database\Factories\CompaignFactory> */
    use HasFactory;
 public function location()
 {
 return $this->belongsTo(Location::class);
 }
 public function team()
 {
 return $this->belongsTo(Team::class);
 }

}
