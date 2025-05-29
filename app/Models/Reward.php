<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Report;

class Reward extends Model
{
    /** @use HasFactory<\Database\Factories\RewardFactory> */
    use HasFactory;
    protected $guarded =['id'];
 protected $casts = [
 'description' => 'array',
 ];
  public function shouldReturnRawJson(){
  if(!app()->runningInConsole() && $request = app(Request::class)){
  $action = $request->route()->getActionMethod();

  return $action ==='show';
  }
  return false;
  }

    public function report(){
        return $this->belongsTo(Report::class);
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
}