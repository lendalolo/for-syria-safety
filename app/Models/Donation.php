<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tool;
use App\Models\User;

class Donation extends Model
{
protected $guarded= ['id'];
    /** @use HasFactory<\Database\Factories\DonationFactory> */
    use HasFactory;
    public function tool(){
    return $this->belongsTo(Tool::class);
    }
    public function user(){
    return $this->belongsTo(User::class);
    }
}
