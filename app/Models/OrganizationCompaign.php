<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Organization;
use App\Models\Compaign;

class OrganizationCompaign extends Model
{
    protected $guarded =['id'];
    public function organization(){
    return $this->belongsTo(Organization::class);
    }
    public function compaign(){
    return $this->belongsTo(Compaign::class);
    }
}