<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Compaign;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ToolCompaign;
use App\Models\Donation;
use App\Models\User;
use Illuminate\Support\Facades\App;

class Tool extends Model
{
use HasFactory;
    protected $guarded =['id'];
       protected $casts = [
       'name' => 'array',
       ];
   public function compaigns()
   {
       return $this->hasMany(Compaign::class);
   }
//    public function toolCompaigns()
//    {
//    return $this->hasMany(ToolCompaign::class);
//    }
    public function donations(){
        return $this->hasMany(Donation::class);
    }
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
}
