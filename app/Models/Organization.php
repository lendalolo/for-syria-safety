<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Compaign;
use App\Models\OrganizationCompaign;
class Organization extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    protected $casts = [
    'name' => 'array',
    'description' => 'array',
    ];
    public function compaigns()
    {
        return $this->belongsToMany(Compaign::class);
    }
    public function organizationCompaigns(){
        return $this->hasMany(OrganizationCompaign::class);
    }
}