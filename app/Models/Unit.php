<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use App\Models\Team;

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

}
