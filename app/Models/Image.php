<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Image extends Model
{
    use HasFactory;
    
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    public function getThumbnailAttribute()
    {
        $condition = [
            ['name', '=', $this->name ],
            ['is_thumb', '=', 1],
        ];
        $thumbnail = Image::where($condition)->first();
        return $thumbnail;
    }
}
