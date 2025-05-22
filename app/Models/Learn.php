<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Objective;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Learn extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\LearnFactory> */
    use HasFactory,InteractsWithMedia;
    protected $guarded =['id'];

public function objective()
{
    return $this->belongsTo(Objective::class);
}

    public function registerMediaCollections():void
    {
    $this->addMediaCollection('learns')
    ->useDisk('media');

    }
}