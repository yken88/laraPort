<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Resident;
use App\Models\Post;

class Unit extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function residents()
    {
        return $this->hasMany(Resident::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public static function scopeOption($query)
    {
        return $query->select('id','unit_name','floor')->get();
    }
}
