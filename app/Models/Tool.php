<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Compaign;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ToolCompaign;
class Tool extends Model
{
use HasFactory;
    protected $guarded =['id'];

    public function compaigns()
    {
        return $this->hasMany(Compaign::class);
    }
    public function toolCompaigns()
    {
    return $this->hasMany(ToolCompaign::class);
    }
}