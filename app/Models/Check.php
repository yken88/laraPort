<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;




class Check extends Model
{
    protected $fillable = ['user_id', 'post_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
    
    public static function scopeMember($query, $id)
    {
        return $query->orderBy('created_at', 'desc')
                    ->where('post_id', $id)
                    ->with('user')
                    ->get();
    }               

    public static function scopeChecked($query, $id, $user_id)
    {
        return $query->where('user_id', $user_id)
                     ->where('post_id', $id)
                     ->exists();
    }
}
