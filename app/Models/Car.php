<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['model', 'city', 'volume', 'mileage', 'transmission', 'image', 'category_id', 'user_id', 'price', 'phone'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function usersRated()
    {
        return $this->belongsToMany(User::class, 'car_user')
            ->withPivot('rating')
            ->withTimestamps();
    }

    public function messageToCar()
    {
        return $this->belongsToMany(User::class, 'user_car')
            ->withPivot('message')
            ->withTimestamps();
    }

    public function usersFavorite()
    {
        return $this->belongsToMany(User::class, 'user_favorite')
            ->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
