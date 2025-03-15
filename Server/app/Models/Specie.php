<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'animal_kingdom_id',
        'habitat_id',
        'common_name',
        'scientific_name',
        'seend_amount',
    ];

    public function specieTypes()
    {
        return $this->belongsToMany(SpecieType::class, 'specie_specie_type');
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

    public function user(){
        return $this->belongsTo(User::class);
    }
}
