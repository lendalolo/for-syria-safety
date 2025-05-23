<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Compaign;
use App\Models\Tool;
class ToolCompaign extends Model
{

    protected $guarded =['id'];

    public function compaigns()
    {
        return $this->belongsTo(Compaign::class);
    }
    public function tool()
    {
    return $this->belongsTo(Tool::class);
    }
}
