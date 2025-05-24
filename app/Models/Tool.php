<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Compaign;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ToolCompaign;
use App\Models\Donation;
use App\Models\User;
class Tool extends Model
{
use HasFactory;
    protected $guarded =['id'];

   public function compaigns()
   {
       return $this->belongsToMany(Compaign::class);
   }
    public function toolCompaigns()
    {
    return $this->hasMany(ToolCompaign::class);
    }
    public function donations(){
        return $this->hasMany(Donation::class);
    }

}