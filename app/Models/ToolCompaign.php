<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToolCompaign extends Model
{
     protected $guarded =['id'];
     public function tool(){
     return $this->belongsTo(Tools::class);
     }
     public function compaign(){
     return $this->belongsTo(Compaign::class);
     }
}
