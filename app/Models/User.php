<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Post;
use App\Models\Check;
use App\Models\Unit;

class User extends Authenticatable
{
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function checks()
    {
        return $this->hasMany(Check::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function shouldBeSeachable()
    {
        return $this->isPubliched();
    }

    
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'unit_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];    

    public static function scopeOption($query)
    {
        return $query->select('id','name')->get();
    }
}
