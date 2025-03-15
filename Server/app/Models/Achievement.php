<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = [
        'name',
        'description',
        'points_to_complete',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_achievement')
            ->withPivot('points')
            ->withTimestamps();
    }
}
