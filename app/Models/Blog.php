<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Blog extends Model
{
    public function scopeGetBlogPage($query, $code)
    {
        $query = DB::table("blog")
            ->select(
                'title',
                'content',
                'tags',
                'image',
            )
            ->where('category', 'PAGE')
            ->where('code', $code)
            ->first();

        return $query;
    }

    public function scopeGetBlogNewsLists($query)
    {
        $query = DB::table("blog")
            ->select(
                'slug',
                'title',
                'content',
                'tags',
                'image',
                'created_at',
                'updated_by',
            )
            ->where('category', 'NEWS')
            ->where('is_active', 1)
            ->take(10)
            ->get();

        return $query;
    }

    public function scopeGetBlogNews($query, $slug)
    {
        $query = DB::table("blog")
            ->select(
                'title',
                'content',
                'tags',
                'image',
                'created_at',
                'updated_by',
            )
            ->where('category', 'NEWS')
            ->where('slug', $slug)
            ->first();

        return $query;
    }
}
