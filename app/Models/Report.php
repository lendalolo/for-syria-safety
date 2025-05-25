<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reward;
use App\Models\User;
use App\Models\Location;
use App\Models\Team;
use App\Models\TeamReport;
class Report extends Model
{
    /** @use HasFactory<\Database\Factories\ReportFactory> */
    use HasFactory;
    protected $guarded =['id'];
    protected $fillable = [
        'description',
        'statue',
        'user_id',
        'location_id',
    ];
      protected $casts = [
      'description' => 'array',
      ];

    public function reward()
    {
        return $this->hasOne(Reward::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function teamReports(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(TeamReport::class);

    }

}
