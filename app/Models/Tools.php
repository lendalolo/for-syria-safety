<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tools extends Model
{
    protected $guarded =['id'];
    public function toolCompaigns(){
    return $this->hasMany(ToolCompaign::class);
    }
    public function compaigns(){
    return $this->belongsToMany(Compaign::class);
    }
}
