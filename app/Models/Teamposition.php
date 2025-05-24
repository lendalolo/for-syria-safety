<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;
class Teamposition extends Model
{
    /** @use HasFactory<\Database\Factories\TeampositionFactory> */
    use HasFactory;
    protected $guarded =['id'];

    public function teams(){
        return $this->hasMany(Team::class);
    }


}
