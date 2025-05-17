<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Compaign;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Step extends Model
{
use HasFactory;
    protected $guarded =['id'];

    public function compaigns()
    {
        return $this->hasMany(Compaign::class);
    }
}