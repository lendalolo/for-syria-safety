<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Team;
use App\Models\Report;
use App\Models\Tool;
use App\Models\Donation;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Laravel\Sanctum\HasApiTokens;
class User extends Authenticatable implements HasMedia
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens,HasFactory, Notifiable,InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    public function isAdmin(){
        return $this->role==='admin';
    }
    public function isUser(){
        return $this->role==='user';
    }
    public function isMember(){
    return $this->role==='member';
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function registerMediaCollections()
    {
        $this->addMediaCollection('users');
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
    public function donations(){
        return $this->hasMany(Donation::class);
    }
    public function tools(){
        return $this->belongsToMany(Tool::class);
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}