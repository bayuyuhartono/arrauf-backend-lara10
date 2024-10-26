<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Gallery extends Model
{
    public function scopeGetGalleryList($query, $type, $limit = 4)
    {
        $query = DB::table("cms_gallery")
            ->select('*')
            ->where('type', $type)
            ->orderBy('sequence', 'asc')
            ->take($limit)
            ->get();

        return $query;
    }

    public function scopeGetGallery($query, $uuid)
    {
        $query = DB::table("cms_gallery")
            ->select('*')
            ->where('uuid', $uuid)
            ->first();

        return $query;
    }
}
