<?php

namespace App\Services;

use App\Models\FileRecord;

class FileService
{
    public function storeFile($path, $originalName)
    {
        return FileRecord::create([
            'path' => $path,
            'original_name' => $originalName,
        ]);
    }

    public function getFile($id)
    {
        return FileRecord::findOrFail($id);
    }
}
