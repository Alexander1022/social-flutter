<?php

namespace App\Services;

use App\Models\FileRecord;
use App\Http\Resources\FileRecordResource;
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
        try {
            $fileRecord = FileRecord::findOrFail($id);
            return new FileRecordResource($fileRecord);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'No such file found'], 404);
        }
    }
}
