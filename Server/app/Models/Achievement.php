<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = [
        'name',
        'description',
        'points_to_complete',
        'reward_xp',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_achievement')
            ->withPivot('points')
            ->withTimestamps();
    }

    public function specieTypes()
    {
        return $this->belongsToMany(SpecieType::class, 'achievement_specie_type')
            ->withTimestamps();
    }
}
