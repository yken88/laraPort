<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\Unit;
use App\Models\Adl;

class Resident extends Model
{
    protected $guarded = [
        'resident_name',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
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
