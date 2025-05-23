<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use App\Models\Learn;
class Objective extends Model
{
    use HasFactory;
    protected $guarded =['id'];

    public function learns()
    {
        return $this->belongsTo(Learn::class);
    }
}
