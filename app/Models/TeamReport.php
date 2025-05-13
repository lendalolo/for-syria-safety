<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;
use App\Models\Report;
class TeamReport extends Model
{
    /** @use HasFactory<\Database\Factories\TeamReportFactory> */
    use HasFactory;
     protected $guarded =['id'];

     public function team()
     {
     return $this->belongsTo(Team::class);
     }
     public function report()
     {
     return $this->belongsTo(Report::class);
     }


}