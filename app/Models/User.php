<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

const ADMIN = 1;
const EDITOR = 2;
const GUEST = 3;

public static function isAdmin()
{
    if(auth()->user()->role_id == self::ADMIN){
        return true;
    }
}

public static function isEditor()
{
    if(auth()->user()->role_id == self::EDITOR){
        return true;
    }
}

public static function isGuest()
{
    if(auth()->user()->role_id == self::GUEST){
        return true;
    }
}




    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
//relationship
public function profile()
{
   return $this->hasOne(Profile::class);
}

public function role()
{
    return $this->belongsTo(Role::class);
}


}
