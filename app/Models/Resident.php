<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\Adl;

class Resident extends Model
{
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function Adl()
    {
        return $this->hasOne(Adl::class);
    }

    public static function scopeOption($query)
    {
        return $query->select('id','resident_name')->get();
    }
}
