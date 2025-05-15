<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Objective;
class Learn extends Model
{
    /** @use HasFactory<\Database\Factories\LearnFactory> */
    use HasFactory;
    protected $guarded =['id'];

public function objective()
{
    return $this->belongsTo(Objective::class);
}

}