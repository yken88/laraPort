<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Resident;
use Illuminate\Notifications\Notifiable;


class Adl extends Model
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'resident_id',
    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }

    
}
