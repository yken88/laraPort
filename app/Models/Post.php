<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Check;
use App\Models\Resident;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function checks()
    {
        return $this->hasMany(Check::class);
    }

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }

    // 日付のみの取得
    public function getCreatedAtAttribute($date)
    {
    return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }
    
}   

    

