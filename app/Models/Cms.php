<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cms extends Model
{
    public function scopeGetWallpaper($query)
    {
        $query = DB::table("cms_wallpaper")
            ->select(
                'wallpaper_text',
                'wallpaper_image',
            )
            ->first();

        return $query;
    }

    public function scopeGetQuote($query)
    {
        $query = DB::table("cms_quote")
            ->select(
                'quote',
                'quote_sub',
            )
            ->first();

        return $query;
    }

    public function scopeGetContact($query)
    {
        $query = DB::table("cms_contact")
            ->select(
                'sequence',
                'element',
                'text',
                'link',
            )
            ->where('is_active',1)
            ->orderBy('sequence', 'asc')
            ->get();

        return $query;
    }

    public function scopeGetPpdb($query)
    {
        $query = DB::table("cms_ppdb")
            ->select(
                'text',
                'link',
                'is_active',
            )
            ->first();

        return $query;
    }

    public function scopeGetTestimoniList($query)
    {
        $query = DB::table("cms_testimoni")
            ->select(
                'name',
                'description',
            )
            ->orderBy('sequence', 'asc')
            ->get();

        return $query;
    }

    public function scopeGetMottoList($query)
    {
        $query = DB::table("cms_motto")
            ->select(
                'title',
                'description',
            )
            ->orderBy('sequence', 'asc')
            ->get();

        return $query;
    }

    public function scopeGetBenefitList($query)
    {
        $query = DB::table("cms_benefit")
            ->select(
                'title',
                'point',
            )
            ->orderBy('sequence', 'asc')
            ->get();

        return $query;
    }
}
