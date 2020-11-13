<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Resident;

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

}
