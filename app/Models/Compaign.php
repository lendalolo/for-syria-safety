<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location;
use App\Models\ToolCompaign;
use App\Models\Tool;
use App\Models\Step;
use App\Models\Organization;
use App\Models\Team;
use App\Models\OrganizationCompaign;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Compaign extends Model implements HasMedia
{

    /** @use HasFactory<\Database\Factories\CompaignFactory> */
    use HasFactory,InteractsWithMedia;
    protected $guarded = ['id'];
 public function location()
 {
 return $this->belongsTo(Location::class);
 }
 public function registerMediaCollections():void
 {
        $this->addMediaCollection('compaigns');
 }
 public function team()
 {
 return $this->belongsTo(Team::class);
 }
public function tools(){
return $this->belongsToMany(Tool::class);
}
 public function toolCompaigns(){
 return $this->hasMany(ToolCompaign::class);
 }
// public function organizations(){
// return $this->belongsToMany(Organization::class);
// }
 public function organizationCompaign(){
 return $this->hasMany(OrganizationCompaign::class);
 }
 public function step(){
 return $this->hasMany(Step::class);
 }
}