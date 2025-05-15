<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Compaign;
class Steps extends Model
{

    protected $guarded =['id'];

    public function compaigns()
    {
        return $this->hasMany(Compaign::class);
    }
}