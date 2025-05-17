<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\models\Compaign;
use App\models\OrganizationCompaign;
class Organization extends Model
{
    use HasFactory;
    protected $guarded =['id'];

    public function compaigns()
    {
        return $this->belongsToMany(Compaign::class);
    }
    public function organizationCompaigns(){
        return $this->hasMany(OrganizationCompaign);
    }
}