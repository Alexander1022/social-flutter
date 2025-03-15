<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'original_name',
        'fileable_type',
        'fileable_id',
        'file_type_id',
    ];

    public function fileable()
    {
        return $this->morphTo();
    }

    public function fileType()
    {
        return $this->belongsTo(FileType::class);
    }
}
