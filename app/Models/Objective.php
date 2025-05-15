<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Learn;
class Objective extends Model
{
    protected $guarded =['id'];

    public function learns()
    {
        return $this->hasMany(Learn::class);
    }
}