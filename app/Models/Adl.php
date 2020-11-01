<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Resident;

class Adl extends Model
{
    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }

    
}
