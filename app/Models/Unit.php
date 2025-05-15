<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Team;

class Unit extends Model
{
    protected $guarded =['id'];
    public function team(){
    return $this->hasMany(Team::class);
    }

}