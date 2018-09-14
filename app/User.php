<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password', 'addr', 'zip', 'state', 'city', 'phone'];
    protected $hidden = ['password', 'remember_token',];

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function role()
    {
        return $this->hasOne(UserRole::class);
    }

    public function isAdmin()
    {
        return $this->role()->first() != null;
    }
}
