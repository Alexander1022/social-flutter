<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'lat',
        'lng',
    ];

    public function specie()
    {
        return $this->belongsTo(Specie::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images(){
        return $this->morphMany(FileRecord::class, 'fileable');
    }

    public function getImageUrlsAttribute()
    {
        return $this->images->map(fn($image) => url($image->path));
    }
}
