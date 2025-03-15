<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecieType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function species()
    {
        return $this->belongsToMany(Specie::class, 'specie_specie_type');
    }
}
