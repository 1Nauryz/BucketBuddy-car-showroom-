<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
    public function carsRated()
    {
        return $this->belongsToMany(Car::class, 'car_user')
            ->withPivot('rating')
            ->withTimestamps();
    }

    public function messageUser()
    {
        return $this->belongsToMany(Car::class, 'user_car')
            ->withPivot('message')
            ->withTimestamps();
    }

    public function carsFavorites()
    {
        return $this->belongsToMany(Car::class, 'user_favorite')
            ->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
