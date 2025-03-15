<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    use HasFactory;

    protected $fillable = [
        'animal_kingdom_id',
        'habitat_id',
        'common_name',
        'scientific_name',
        'seend_amount',
    ];

    public function species()
    {
        return $this->hasMany(Specie::class);
    }

    public function animalKingdom()
    {
        return $this->belongsTo(AnimalKingdom::class);
    }

    public function specieType()
    {
        return $this->belongsTo(SpecieType::class);
    }

    public function habitat()
    {
        return $this->belongsTo(Habitat::class);
    }

    public function image()
    {
        return $this->morphOne(FileRecord::class, 'fileable');
    }
}
