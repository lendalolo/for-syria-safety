<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\ToolCompaign;
use App\Models\Tool;
use Illuminate\Support\Facades\App;
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
  protected $casts = [
  'name' => 'array',
  'description' => 'array',
  'article' => 'array',
  ];
                public function shouldReturnRawJson(){
                if(!app()->runningInConsole() && $request = app(Request::class)){
                $action = $request->route()->getActionMethod();

                return $action ==='show';
                }
                return false;
                }


   public function name():Attribute{
   return Attribute::make(
   get: function ($value) {
   $decoded = json_decode($value, true);
    if($this->shouldReturnRawJson()){
    return $decoded;
    }
   $locale = App::getLocale();
   return $decoded[$locale] ?? null;
   },
   set: fn ($value) => is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE) : $value
   );
   }
   public function description():Attribute{
   return Attribute::make(
   get: function ($value) {
   $decoded = json_decode($value, true);
         if($this->shouldReturnRawJson()){
         return $decoded;
         }
   $locale = App::getLocale();
   return $decoded[$locale] ?? null;
   },
   set: fn ($value) => is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE) : $value
   );
   }
      public function article():Attribute{
            return Attribute::make(
            get: function ($value) {
            $decoded = json_decode($value, true);
           if($this->shouldReturnRawJso0n()){
           return $decoded;
           }
            $locale = App::getLocale();
            return $decoded[$locale] ?? null;
            },
            set: fn ($value) => is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE) : $value
            );
      }
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
public function OrganizationCompaign(){
return $this->hasMany(OrganizationCompaign::class);
}
 public function steps(){
 return $this->hasMany(Step::class);
 }
}
